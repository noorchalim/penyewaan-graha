<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_perlengkapan',
        'deskripsi',
        'jumlah',
        'harga_sewa',
    ];
    // public function permohonanSewas()
    // {
    //     return $this->belongsToMany(PermohonanSewa::class, 'permohonan_sewa_perlengkapans')
    //         ->withPivot('quantity')
    //         ->withTimestamps();
    // }
    public function permohonanSewas()
    {
        return $this->belongsToMany(PermohonanSewa::class, 'permohonan_sewa_perlengkapan')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
