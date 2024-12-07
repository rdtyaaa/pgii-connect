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
    public function detailPayment(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $student = Student::where('user_id', auth()->id())->first();

        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => 70000,
        ];

        $customer_details = [
            'name' => $student->name, // Mengambil nama dari tabel student
            'email' => $student->email, // Mengambil email dari tabel student
            'phone' => $student->phone, // Mengambil nomor telepon dari tabel student
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        $snapToken = Snap::getSnapToken($params);

        $payment = Payment::where('user_id', auth()->id())->where('description', 'Pembelian Formulir')->where('status', 'pending')->first();

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
                'description' => 'Pembelian Formulir',
            ]);
        }

        return view('student.form-payment', compact('snapToken', 'student'));
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

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Payment not found']);
    }

    public function handleCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $json = json_decode($request->getContent(), true);

        if ($json['signature_key'] !== hash('sha512', $json['order_id'] . $json['status_code'] . $json['gross_amount'] . $serverKey)) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $payment = Payment::where('order_id', $json['order_id'])->first();

        if ($json['transaction_status'] == 'settlement') {
            $payment->update(['status' => 'success']);
        } elseif ($json['transaction_status'] == 'pending') {
            $payment->update(['status' => 'pending']);
        } elseif ($json['transaction_status'] == 'deny' || $json['transaction_status'] == 'expire' || $json['transaction_status'] == 'cancel') {
            $payment->update(['status' => 'failed']);
        }

        return response()->json(['message' => 'Callback received']);
    }
}
