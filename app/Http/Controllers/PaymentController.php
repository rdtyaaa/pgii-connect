<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
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

        $payment = Payment::where('user_id', auth()->id())
            ->where('description', $paymentDetails['description'])
            ->where('status', 'pending')
            ->first();

        if ($payment) {
            $payment->update([
                'order_id' => $transaction_details['order_id'],
                'amount' => $transaction_details['gross_amount'],
                'snap_token' => $snapToken,
            ]);
        } else {
            $payment = Payment::create([
                'order_id' => $transaction_details['order_id'],
                'user_id' => auth()->id(),
                'amount' => $transaction_details['gross_amount'],
                'snap_token' => $snapToken,
                'status' => 'pending',
                'description' => $paymentDetails['description'],
            ]);
        }

        return view('student.form-payment', compact('snapToken', 'student'));
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

    public function storePayment(Request $request)
    {
        // Validasi data pembayaran yang diterima
        $request->validate([
            'order_id' => 'required|string',
            'payment_type' => 'required|string',
            'status_code' => 'required|string',
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

            return redirect()
                ->route('document')
                ->with([
                    'success' => 'Pembayaran berhasil.',
                ]);
        }

        return response()->json(['success' => false, 'message' => 'Payment not found']);
    }
}
