<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    public function rules()
    {
        return [
            'paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'harga' => 'required|numeric|min:0',
            'jam' => [
                'required',
                'string',
                'regex:/^\d{2}:\d{2}-\d{2}:\d{2}$/', // Format jam harus seperti '08:00-14:00'
            ],
        ];
    }

    public function messages()
    {
        return [
            'jam.regex' => 'Format jam harus berupa "08:00-14:00" atau "17:00-22:00".',
        ];
    }
}
