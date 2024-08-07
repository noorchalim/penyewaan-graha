<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'paket', 'deskripsi', 'harga',
        'jam_mulai',
        'jam_selesai',
    ];

    public function permohonans()
    {
        return $this->hasMany(PermohonanSewa::class);
    }
}
