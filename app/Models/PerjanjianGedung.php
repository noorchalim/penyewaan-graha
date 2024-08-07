<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerjanjianGedung extends Model
{
    use HasFactory;

    protected $fillable = [
        'permohonan_sewa_id', 'kategori_id', 'vendor_id', 'jadwal_gedung_id', 'tanggal_perjanjian', 'status', 'catatan'
    ];

    public function permohonanSewa()
    {
        return $this->belongsTo(PermohonanSewa::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function jadwalGedung()
    {
        return $this->belongsTo(JadwalGedung::class);
    }
}
