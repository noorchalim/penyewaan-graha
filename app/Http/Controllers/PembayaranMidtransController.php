<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log; // Pastikan Anda mengimpor Log
use App\Models\Pembayaran;

class PembayaranMidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_ENVIRONMENT') === 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function getTokenFromServer(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'totalBiaya' => 'required|numeric|min:1',
            'permohonanId' => 'required|integer',
        ]);

        $order_id = $validated['permohonanId'];  // Menggunakan permohonanId sebagai order_id
        $gross_amount = $validated['totalBiaya'];  // Menggunakan totalBiaya sebagai gross_amount

        $transactionDetails = [
            'order_id' => $order_id,
            'gross_amount' => $gross_amount,
        ];

        $itemDetails = [
            [
                'id' => 'item1',
                'price' => $gross_amount,
                'quantity' => 1,
                'name' => 'Sewa Gedung'
            ]
        ];

        $customerDetails = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '081234567890',
            'address' => '123 Street Name',
            'city' => 'City Name',
            'postal_code' => '12345',
            'country_code' => 'IDN'
        ];

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails
        ];

        try {
            // Membuat transaksi dan mendapatkan token
            $snapToken = Snap::createTransaction($transactionData)->token;

            // Mengembalikan respons JSON dengan token
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
