<?php

namespace App\Http\Controllers;

use App\Models\JadwalGedung;
use Illuminate\Http\Request;

class JadwalGedungController extends Controller
{
    public function index()
    {
        return JadwalGedung::all();
    }

    public function show($id)
    {
        return JadwalGedung::find($id);
    }

    public function store(Request $request)
    {
        return JadwalGedung::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalGedung::find($id);
        $jadwal->update($request->all());
        return $jadwal;
    }

    public function destroy($id)
    {
        return JadwalGedung::destroy($id);
    }
}
