<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Payment;


class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Mengatur environment menggunakan metode setEnvironment
        if (config('midtrans.environment') == 'production') {
            Config::$isProduction = true;
        } else {
            Config::$isProduction = false;
        }
    }

    public function getToken(Request $request)
    {
        $transactionDetails = [
            'order_id' => $request->order_id,
            'gross_amount' => $request->amount,
        ];

        $itemDetails = [
            [
                'id' => 'item1',
                'price' => $request->amount,
                'quantity' => 1,
                'name' => 'Transaction'
            ]
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
        ];

        $snapToken = Snap::getSnapToken($transaction);

        // Menyimpan data pembayaran ke database
        Payment::create([
            'order_id' => $request->order_id,
            'permohonan_sewa_id' => $request->permohonan_sewa_id, // Pastikan ini dikirimkan
            'amount' => $request->amount,
            'status' => 'pending',
            'response' => json_encode(['token' => $snapToken]),
        ]);

        return response()->json(['token' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $transactionStatus = $request->input('transaction_status');
        $orderId = $request->input('order_id');

        $payment = Payment::where('order_id', $orderId)->first();

        if ($payment) {
            $payment->status = $transactionStatus;
            $payment->response = json_encode($request->all());
            $payment->save();
        }

        return response()->json(['status' => 'success']);
    }
}
