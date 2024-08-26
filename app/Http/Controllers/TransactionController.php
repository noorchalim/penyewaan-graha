<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Sesuaikan dengan nama model Anda
use App\Models\PermohonanSewa; // Sesuaikan dengan nama model Anda
// se App\Models\PermohonanSewa;
use App\Models\TanggalSewa;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input request
        $validated = $request->validate([
            'order_id' => 'required|string',
            'gross_amount' => 'required|numeric',
            'transaction_status' => 'required|string',
            'permohonan_sewa_id' => 'required|exists:permohonan_sewas,id',
        ]);

        // Proses penyimpanan transaksi dan tanggal sewa dalam satu transaksi database
        DB::transaction(function () use ($validated) {
            // Simpan transaksi
            $transaction = Transaction::create($validated);
            Log::info('Transaction stored: ', ['id' => $transaction->id]);

            // Ambil permohonan sewa terkait
            $permohonanSewa = PermohonanSewa::find($transaction->permohonan_sewa_id);

            if ($permohonanSewa) {
                Log::info('Permohonan sewa ditemukan, ID: ' . $permohonanSewa->id);

                try {
                    // Buat entri baru di tabel tanggal_sewas
                    TanggalSewa::create([
                        'permohonan_sewa_id' => $permohonanSewa->id,
                        'tanggal' => $permohonanSewa->tanggal,
                    ]);

                    Log::info('Entri tanggal sewa berhasil dibuat.');
                } catch (\Exception $e) {
                    Log::error('Gagal membuat entri tanggal sewa: ' . $e->getMessage());
                }
            } else {
                Log::warning('Permohonan sewa tidak ditemukan untuk transaction ID: ' . $transaction->id);
            }
        });

        return response()->json(['message' => 'Transaction stored successfully'], 201);
    }

    public function handleWebhook(Request $request)
    {
        $data = $request->all();

        // Log webhook received
        Log::info('Webhook received: ', $data);

        $orderId = $data['order_id'];
        $transactionStatus = $data['transaction_status'];

        // Start a database transaction
        DB::transaction(function () use ($orderId, $transactionStatus) {
            // Find the transaction
            $transaction = Transaction::where('order_id', $orderId)->first();

            if ($transaction) {
                Log::info('Transaction found: ', ['id' => $transaction->id]);

                // Update transaction status
                if ($transactionStatus === 'settlement') {
                    $transaction->transaction_status = 'settlement';
                    $transaction->save();
                    Log::info('Transaction status updated to settlement');

                    // Ambil permohonan sewa terkait
                    $permohonanSewa = PermohonanSewa::find($transaction->permohonan_sewa_id);

                    if ($permohonanSewa) {
                        Log::info('Permohonan sewa ditemukan, ID: ' . $permohonanSewa->id);

                        try {
                            // Buat entri baru di tabel tanggal_sewas
                            TanggalSewa::create([
                                'permohonan_sewa_id' => $permohonanSewa->id,
                                'tanggal' => $permohonanSewa->tanggal,
                            ]);

                            Log::info('Entri tanggal sewa berhasil dibuat.');
                        } catch (\Exception $e) {
                            Log::error('Gagal membuat entri tanggal sewa: ' . $e->getMessage());
                        }
                    } else {
                        Log::warning('Permohonan sewa tidak ditemukan untuk transaction ID: ' . $transaction->id);
                    }
                } else {
                    Log::warning('Transaction status is not settlement: ' . $transactionStatus);
                }
            } else {
                Log::warning('Transaction not found for order_id: ' . $orderId);
            }
        });
    }


    public function getAdminTransactions()
    {
        // Mengambil semua data transaksi dari database
        $transactions = Transaction::with('permohonanSewa')->get();

        // Mengirim data ke view
        return view('admin.transactions.index', compact('transactions'));
    }
    public function show($id)
    {
        $transaction = Transaction::with(['permohonanSewa'])->findOrFail($id);
        return view('admin.transactions.show', compact('transaction'));
    }

    //////////////////////////

}
