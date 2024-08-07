<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();

        return response()->json($vendors);
    }
    public function getVendors()
    {
        $vendors = Vendor::all();

        return response()->json($vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'nama' => 'required|string',
        //     'pekerjaan' => 'required|string',
        //     'no_hp' => 'required|string|max:20',
        //     'alamat' => 'required|string',
        //     'keperluan' => 'required|string',
        //     'kategori_id' => 'required|exists:kategoris,id',
        //     'vendor_id' => 'nullable|exists:vendors,id',
        //     'status' => 'in:ditinjau,disetujui,ditolak', // Optional, jika Anda ingin mengatur status saat membuat
        // ]);

        // $permohonanSewa = PermohonanSewa::create($request->all());
        // return response()->json($permohonanSewa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return response()->json($vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
