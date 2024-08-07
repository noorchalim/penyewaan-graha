<?php
// app/Http/Controllers/SnapController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SnapController extends Controller
{
    public function getToken(Request $request)
    {
        $orderId = $request->input('order_id');
        $grossAmount = $request->input('gross_amount');

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key') . ':'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://api.sandbox.midtrans.com/v2/charge', [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'credit_card' => [
                'secure' => true,
            ],
            'customer_details' => [
                'first_name' => 'Budi',
                'last_name' => 'Pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ],
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to get token'], $response->status());
        }
    }
}
