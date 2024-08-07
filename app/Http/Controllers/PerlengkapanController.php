<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function getPerlengkapans()
    {
        $perlengkapans = Perlengkapan::all();
        return response()->json($perlengkapans);
    }

    public function index()
    {
        $perlengkapans = Perlengkapan::all();
        return view('admin.perlengkapan.index', compact('perlengkapans'));
    }
    public function create()
    {
        return view('admin.perlengkapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perlengkapan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_sewa' => 'required|numeric',
        ]);

        Perlengkapan::create($request->all());

        return redirect()->route('admin.perlengkapan.index')->with('success', 'Perlengkapan created successfully.');
    }

    public function show(Perlengkapan $perlengkapan)
    {
        return view('admin.perlengkapan.show', compact('perlengkapan'));
    }

    public function edit(Perlengkapan $perlengkapan)
    {
        return view('admin.perlengkapan.edit', compact('perlengkapan'));
    }

    public function update(Request $request, Perlengkapan $perlengkapan)
    {
        $request->validate([
            'nama_perlengkapan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_sewa' => 'required|numeric',
        ]);

        $perlengkapan->update($request->all());

        return redirect()->route('admin.perlengkapan.index')->with('success', 'Perlengkapan updated successfully.');
    }

    public function destroy(Perlengkapan $perlengkapan)
    {
        $perlengkapan->delete();
        return redirect()->route('admin.perlengkapan.index')->with('success', 'Perlengkapan deleted successfully.');
    }
}
