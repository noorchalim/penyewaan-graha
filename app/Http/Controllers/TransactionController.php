<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Sesuaikan dengan nama model Anda


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|string',
            'gross_amount' => 'required|numeric',
            'transaction_status' => 'required|string',
            'permohonan_sewa_id' => 'required|exists:permohonan_sewas,id',
        ]);

        $transaction = Transaction::create($validated);

        return response()->json(['message' => 'Transaction stored successfully', 'transaction' => $transaction], 201);
    }
}
