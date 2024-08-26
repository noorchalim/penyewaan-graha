<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'pekerjaan',
        'no_hp',
        'alamat',
        'keperluan',
        'kategori_id',
        'vendor_id',
        'tanggal',
        // 'tanggal_selesai',
        // 'perlengkapan_id',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'array', // Cast tanggal as an array
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalGedung::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perlengkapan()
    {
        return $this->belongsToMany(Perlengkapan::class, 'permohonan_sewa_perlengkapan')
            ->withPivot('quantity');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function tanggalSewas()
    {
        return $this->hasMany(TanggalSewa::class);
    }
}
