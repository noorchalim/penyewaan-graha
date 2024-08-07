<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'permohonan_sewa_id',
        'amount',
        'status',
        'response',
    ];

    public function permohonanSewa()
    {
        return $this->belongsTo(PermohonanSewa::class);
    }
}
