<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use App\Models\PermohonanSewa;
use App\Models\PerjanjianGedung;
use App\Models\PembayaranGedung;
use App\Models\PermohonanSewaPerlengkapan;
use App\Models\Perlengkapan;
use App\Http\Requests\StorePermohonanSewaRequest;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;



class PermohonanSewaController extends Controller
{


    public function getAdminPermohonanSewa()
    {
        $permohonans = PermohonanSewa::all();

        $users = User::all();
        $vendors = Vendor::all();
        $kategoris = Kategori::all();

        return view('admin.permohonansewa.index', compact('kategoris', 'users', 'vendors', 'permohonans'));
    }
    public function editAdminPermohonanSewa($id)
    {
        $permohonan = PermohonanSewa::findOrFail($id);
        $kategoris = Kategori::all(); // Assuming you have a Kategori model
        $vendors = Vendor::all(); // Assuming you have a Vendor model
        return view('admin.permohonansewa.edit', compact('permohonan', 'kategoris', 'vendors'));
    }
    public function updateAdminPermohonanSewa(Request $request, $id)
    {

        $permohonan = PermohonanSewa::findOrFail($id);

        // Validate only the status field
        $request->validate([
            'status' => 'required|string|in:ditinjau,disetujui,ditolak',
        ]);

        // Update only the status field
        $permohonan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.permohonansewa.getAdminPermohonanSewa')->with('success', 'Permohonan updated successfully');
    }

    // public function getPerlengkapanByPivot($id)
    // {
    //     // Retrieve the permohonan sewa by ID
    //     $permohonanSewa = PermohonanSewa::findOrFail($id);

    //     // Fetch the perlengkapan associated with the permohonan sewa via pivot table
    //     $perlengkapan = DB::table('permohonan_sewa_perlengkapan')
    //         ->join('perlengkapans', 'permohonan_sewa_perlengkapan.perlengkapan_id', '=', 'perlengkapans.id')
    //         ->where('permohonan_sewa_perlengkapan.permohonan_sewa_id', $id)
    //         ->select('perlengkapans.*', 'permohonan_sewa_perlengkapan.quantity')
    //         ->get();

    //     return response()->json($perlengkapan);
    // }

    // public function getPerlengkapan($id)
    // {
    //     // Pastikan permohonan sewa dengan ID tersebut ada
    //     $permohonan = PermohonanSewa::findOrFail($id);

    //     // Mengambil perlengkapan terkait dari tabel pivot
    //     $perlengkapan = DB::table('permohonan_sewa_perlengkapan')
    //         ->join('perlengkapans', 'permohonan_sewa_perlengkapan.perlengkapan_id', '=', 'perlengkapans.id')
    //         ->where('permohonan_sewa_perlengkapan.permohonan_sewa_id', $id)
    //         ->select('perlengkapans.*', 'permohonan_sewa_perlengkapan.quantity')
    //         ->get();

    //     return response()->json($perlengkapan);
    // }

    public function getPerlengkapanByPermohonan($id)
    {
        $perlengkapan = DB::table('permohonan_sewa_perlengkapans')
            ->join('perlengkapans', 'permohonan_sewa_perlengkapans.perlengkapan_id', '=', 'perlengkapans.id')
            ->select('perlengkapans.*', 'permohonan_sewa_perlengkapans.quantity')
            ->where('permohonan_sewa_perlengkapans.permohonan_sewa_id', $id)
            ->get();

        return response()->json($perlengkapan);
    }

    public function index(Request $request)
    {
        try {
            $userId = $request->query('user_id');
            if (!$userId) {
                return response()->json(['error' => 'User ID is required'], 400);
            }

            $permohonans = PermohonanSewa::where('user_id', $userId)->get();
            return response()->json($permohonans, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // public function show($id)
    // {
    //     $permohonanSewa = PermohonanSewa::with('perlengkapans')->find($id);

    //     return response()->json($permohonanSewa);
    // }
    public function show($id)
    {
        $permohonan = PermohonanSewa::with('kategori', 'vendor', 'perlengkapan')
            ->findOrFail($id);

        // Mengambil perlengkapan terkait dari tabel pivot
        $perlengkapan = DB::table('permohonan_sewa_perlengkapan')
            ->join('perlengkapans', 'permohonan_sewa_perlengkapan.perlengkapan_id', '=', 'perlengkapans.id')
            ->where('permohonan_sewa_perlengkapan.permohonan_sewa_id', $id)
            ->select('perlengkapans.*', 'permohonan_sewa_perlengkapan.quantity')
            ->get();

        return response()->json([
            'permohonan' => $permohonan,
            'perlengkapan' => $perlengkapan
        ]);
    }

    public function getStatus($id)
    {
        $permohonan = PermohonanSewa::findOrFail($id);
        return response()->json([
            'status' => $permohonan->status
        ]);
    }



    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama' => 'required|string',
    //         'pekerjaan' => 'required|string',
    //         'no_hp' => 'required|string',
    //         'alamat' => 'required|string',
    //         'keperluan' => 'required|string',
    //         'kategori_id' => 'required|integer',
    //         'vendor_id' => 'nullable|integer',
    //         'user_id' => 'required|integer',
    //         'status' => 'required|string',
    //         'perlengkapan' => 'required|array',
    //         'perlengkapan.*.perlengkapan_id' => 'nullable|integer',
    //         'perlengkapan.*.quantity' => 'required|integer',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $permohonanSewa = new PermohonanSewa();
    //     $permohonanSewa->nama = $request->nama;
    //     $permohonanSewa->pekerjaan = $request->pekerjaan;
    //     $permohonanSewa->no_hp = $request->no_hp;
    //     $permohonanSewa->alamat = $request->alamat;
    //     $permohonanSewa->keperluan = $request->keperluan;
    //     $permohonanSewa->kategori_id = $request->kategori_id;
    //     $permohonanSewa->vendor_id = $request->vendor_id;
    //     $permohonanSewa->user_id = $request->user_id;
    //     $permohonanSewa->status = $request->status;
    //     $permohonanSewa->save();

    //     // Assuming there is a pivot table for permohonan_sewa_perlengkapan
    //     foreach ($request->perlengkapan as $item) {
    //         $permohonanSewa->perlengkapan()->attach($item['perlengkapan_id'], ['quantity' => $item['quantity']]);
    //     }

    //     return response()->json(['message' => 'Permohonan Sewa created successfully!'], 201);
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'pekerjaan' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'keperluan' => 'required|string',
            'kategori_id' => 'required|integer',
            'vendor_id' => 'nullable|integer',
            'user_id' => 'required|integer',
            'status' => 'required|string',
            'perlengkapan' => 'array',
            'perlengkapan.*.perlengkapan_id' => 'required|integer',
            'perlengkapan.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $permohonan = PermohonanSewa::create([
                'nama' => $validated['nama'],
                'pekerjaan' => $validated['pekerjaan'],
                'no_hp' => $validated['no_hp'],
                'alamat' => $validated['alamat'],
                'keperluan' => $validated['keperluan'],
                'kategori_id' => $validated['kategori_id'],
                'vendor_id' => $validated['vendor_id'],
                'user_id' => $validated['user_id'],
                'status' => $validated['status'],
            ]);

            foreach ($validated['perlengkapan'] as $perlengkapan) {
                PermohonanSewaPerlengkapan::create([
                    'permohonan_sewa_id' => $permohonan->id,
                    'perlengkapan_id' => $perlengkapan['perlengkapan_id'],
                    'quantity' => $perlengkapan['quantity'],
                ]);
            }

            DB::commit();
            return response()->json($permohonan, 201);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Database error',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Unexpected error',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    public function update(Request $request, $id)
    {
        $permohonanSewa = PermohonanSewa::find($id);

        if (!$permohonanSewa) {
            return response()->json(['message' => 'Permohonan Sewa not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'pekerjaan' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:20',
            'alamat' => 'sometimes|required|string',
            'keperluan' => 'sometimes|required|string',
            'kategori_id' => 'sometimes|required|exists:kategoris,id',
            'vendor_id' => 'sometimes|nullable|exists:vendors,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'status' => 'sometimes|required|string',
            'perlengkapan_id' => 'sometimes|required|exists:perlengkapans,id',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $permohonanSewa->update($request->all());

        return response()->json($permohonanSewa);
    }



    public function destroy($id)
    {
        PermohonanSewa::destroy($id);
        return response()->json(null, 204);
    }
}