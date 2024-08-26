<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggalSewa extends Model
{
    use HasFactory;

    protected $fillable = ['permohonan_sewa_id', 'tanggal'];

    protected $casts = [
        'tanggal' => 'array', // Pastikan data tanggal disimpan dalam format array (json)
    ];
    public function permohonanSewa()
    {
        return $this->belongsTo(PermohonanSewa::class);
    }
}
