<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Midtrans\Snap;
use Midtrans\Config;

class PembayaranController extends Controller
{
    public function getTokenFromServer(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('MIDTRANS_SERVER_KEY') . ':'),
            'Content-Type' => 'application/json',
        ])->post('https://api.sandbox.midtrans.com/v2/charge', [
            'payment_type' => 'credit_card',
            'transaction_details' => [
                'order_id' => 'order-' . time(),
                'gross_amount' => $request->input('gross_amount'),
            ],
            'credit_card' => [
                'secure' => true,
            ],
        ]);

        return response()->json($response->json());
    }


    public function getSnapToken(Request $request)
    {
        $totalBiaya = $request->input('totalBiaya');

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-AdP1CP5hZ3THpuS4uMvtHasB:')
        ])->post('https://api.sandbox.midtrans.com/v2/charge', [
            'transaction_details' => [
                'order_id' => 'order_' . now()->timestamp,
                'gross_amount' => $totalBiaya,
            ],
            'payment_type' => 'credit_card',
            'credit_card' => [
                'secure' => true,
            ],
        ]);

        return response()->json($response->json());
    }
}
