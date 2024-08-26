<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriRequest;


class KategoriController extends Controller
{
    public function getKategoris()
    {
        $kategoris = Kategori::all();
        return response()->json($kategoris);
    }
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(StoreKategoriRequest $request)
    {
        $kategori = new Kategori();
        $kategori->paket = $request->input('paket');
        $kategori->deskripsi = $request->input('deskripsi');
        $kategori->harga = $request->input('harga');
        $kategori->jam = $request->input('jam'); // Format waktu, e.g., '08:00-14:00'
        $kategori->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'paket' => 'required|string|max:255',
    //         'deskripsi' => 'required|string',
    //         'harga' => 'required|numeric',
    //         'jam' => 'required|date_format:H:i',
    //         // 'jam_selesai' => 'required|date_format:H:i',
    //     ]);

    //     Kategori::create($request->all());

    //     return redirect()->route('admin.kategori.index')->with('success', 'Kategori created successfully.');
    // }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return response()->json($kategori);
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        $kategori->update($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
