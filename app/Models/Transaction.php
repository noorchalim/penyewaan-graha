<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'gross_amount',
        'transaction_status',
        'permohonan_sewa_id'
        // tambahkan field lain jika diperlukan
    ];

    public function permohonanSewa()
    {
        return $this->belongsTo(PermohonanSewa::class);
    }
}
