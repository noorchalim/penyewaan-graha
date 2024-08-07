<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranGedung extends Model
{
    protected $fillable = ['jadwal_id', 'jumlah', 'status_pembayaran', 'tanggal_pembayaran'];

    public function jadwal()
    {
        return $this->belongsTo(JadwalGedung::class);
    }

    public function perjanjian()
    {
        return $this->hasOne(PerjanjianGedung::class);
    }
}
