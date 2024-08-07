<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanSewa;

class permohonanSewaPerlengkapanController extends Controller
{
    public function store(Request $request)
    {
        $permohonanSewa = PermohonanSewa::create($request->all());

        $permohonanSewa->perlengkapans()->attach($request->perlengkapan_ids);

        return response()->json($permohonanSewa, 201);
    }
}
