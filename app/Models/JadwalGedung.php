<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGedung extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'permohonan_sewa_id', 'status'];

    public function permohonanSewa()
    {
        return $this->belongsTo(PermohonanSewa::class);
    }
}
