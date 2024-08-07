<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyewaGedung extends Model
{
    protected $fillable = ['nama', 'no_telepon', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalGedung::class);
    }
}
