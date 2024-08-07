<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSewaPerlengkapan extends Model
{
    use HasFactory;
    protected $fillable = [
        'permohonan_sewa_id',
        'perlengkapan_id',
        'quantity',
    ];
}
