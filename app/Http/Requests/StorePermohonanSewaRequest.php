<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermohonanSewaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'keperluan' => 'required|string',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'vendor_id' => 'nullable|integer|exists:vendors,id',
            'user_id' => 'required|integer|exists:users,id',
            'status' => 'required|string|in:ditinjau,disetujui,ditolak',
            'perlengkapan' => 'required|array',
            'perlengkapan.*.perlengkapan_id' => 'required|integer|exists:perlengkapans,id',
            'perlengkapan.*.quantity' => 'required|integer|min:1',
        ];
    }
}
