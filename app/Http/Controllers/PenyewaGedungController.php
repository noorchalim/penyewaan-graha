<?php

namespace App\Http\Controllers;

use App\Models\PenyewaGedung;
use Illuminate\Http\Request;

class PenyewaGedungController extends Controller
{
    public function index()
    {
        $penyewaGedungs = PenyewaGedung::all();
        return response()->json($penyewaGedungs);
    }


    public function show($id)
    {
        return PenyewaGedung::find($id);
    }

    public function store(Request $request)
    {
        return PenyewaGedung::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $penyewa = PenyewaGedung::find($id);
        $penyewa->update($request->all());
        return $penyewa;
    }

    public function destroy($id)
    {
        return PenyewaGedung::destroy($id);
    }
}
