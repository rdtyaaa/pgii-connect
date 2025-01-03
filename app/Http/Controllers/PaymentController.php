<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Log;
use Midtrans\Config;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // Query untuk mengambil data dari model Payment
        $query = Payment::query()->with('user.student')->orderBy('payment_date', 'desc'); // Data terbaru terlebih dahulu

        // Filter berdasarkan search (jika ada)
        if ($search = $request->get('search')) {
            $query
                ->where('order_id', 'like', "%{$search}%")
                ->orWhere('user_id', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('payment_type', 'like', "%{$search}%")
                ->orWhereHas('user.student', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%"); // Mencari berdasarkan nama student
                });
        }

        // Pagination 25 data
        $payments = $query->paginate(25);

        // Ambil unique description untuk dropdown
        $paymentTypes = Payment::select('description')->distinct()->pluck('description');

        return view('admin.payments.index', compact('payments', 'paymentTypes'));
    }

    public function detailPayment(Request $request, $paymentType)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $student = Student::where('user_id', auth()->id())->first();

        $paymentDetails = $this->getPaymentDetails($paymentType);

        if (!$paymentDetails) {
            return response()->json(['error' => 'Invalid payment type'], 400);
        }

        // Cek apakah pembayaran sudah ada dan masih dalam status 'pending'
        $payment = Payment::where('user_id', auth()->id())
            ->where('description', $paymentDetails['description'])
            ->first();

        if (!$payment) {
            // Jika belum ada transaksi yang pending, buat transaksi baru
            $transaction_details = [
                'order_id' => uniqid(),
                'gross_amount' => $paymentDetails['gross_amount'],
            ];

            $customer_details = [
                'name' => $student->name,
                'email' => $student->email,
                'phone' => $student->phone,
            ];

            $params = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
            ];

            $snapToken = Snap::getSnapToken($params);

            // Membuat pembayaran baru
            $payment = Payment::create([
                'order_id' => $transaction_details['order_id'],
                'user_id' => auth()->id(),
                'amount' => $transaction_details['gross_amount'],
                'snap_token' => $snapToken,
                'status' => 'pending',
                'description' => $paymentDetails['description'],
            ]);
        } else {
            // Ambil snapToken yang sudah ada jika transaksi sudah ada
            $snapToken = $payment->snap_token;
        }

        $currentStep = $paymentType === 'formulir' ? 2 : ($paymentType === 'uang_awal' ? 5 : 1);

        return view('student.form-payment', compact('snapToken', 'student', 'currentStep', 'paymentType'));
    }

    private function getPaymentDetails($paymentType)
    {
        switch ($paymentType) {
            case 'formulir':
                return [
                    'gross_amount' => 70000,
                    'description' => 'Pembelian Formulir',
                ];
            case 'uang_awal':
                return [
                    'gross_amount' => 1000000, // misalnya jumlah untuk uang awal
                    'description' => 'Pembayaran Uang Awal',
                ];
            default:
                return null; // Tidak valid
        }
    }

    public function storePayment(Request $request, $paymentType)
    {
        // Validasi data pembayaran yang diterima
        $request->validate([
            'order_id' => 'required|string',
            'payment_type' => 'required|string',
            'gross_amount' => 'required|numeric',
            'transaction_time' => 'required|date',
        ]);

        // Simpan data pembayaran ke database
        $payment = Payment::where('order_id', $request->order_id)->first();
        if ($payment) {
            // Update status pembayaran atau informasi lainnya
            $payment->update([
                'payment_type' => $request->payment_type,
                'status' => 'success',
                'amount' => $request->gross_amount,
                'payment_date' => $request->transaction_time,
            ]);

            $student = Student::where('user_id', auth()->id())->first();
            if ($student) {
                $student->update([
                    'status' => 'Tahap 2',
                ]);
            }

            Log::create([
                'student_id' => $student->id,
                'action' => 'Form Purchase',
                'description' => 'Pembayaran oleh: ' . $student->name . ' berhasil dengan order id - ' . $request->order_id,
            ]);

            // Periksa paymentType yang diterima dari parameter route
            if ($paymentType === 'formulir') {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('document'),
                ]);
            } elseif ($paymentType === 'uang_awal') {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('final'), // Sesuaikan dengan halaman yang dituju
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('/'), // Sesuaikan dengan halaman yang dituju
                ]);
            }
        } else {
        return response()->json([
            'success' => false,
            'message' => 'Pembayaran gagal, data tidak ditemukan.',
        ]);
    }
    }
}
