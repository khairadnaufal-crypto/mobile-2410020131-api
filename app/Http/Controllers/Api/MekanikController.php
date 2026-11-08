<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    // Lihat semua data
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Mekanik::all(),
        ]);
    }

    // Tambah data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'Id_mecanic'             => 'required|string|max:100|unique:mekanik,Id_mecanic',
            'Nama_mecanic'           => 'required|string|max:255',
            'Alamat_mecanic'         => 'nullable|string',
            'Tgllahir_mecanic'       => 'nullable|date',
            'Tempattgllahir_mecanic' => 'nullable|string|max:255',
            'No_tlpn'                => 'nullable|string|max:255',
            'Email_mecanic'          => 'nullable|email|max:100',
            'Status_job'             => 'nullable|string|max:255',
            'Status_mecanic'         => 'nullable|string|max:255',
            'Created_by'             => 'nullable|string|max:255',
            'Updated_by'             => 'nullable|string|max:255',
        ]);

        $mekanik = Mekanik::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Mekanik berhasil ditambahkan',
            'data' => $mekanik,
        ], 201);
    }

    // Lihat satu data berdasarkan id
    public function show(string $id)
    {
        $mekanik = Mekanik::find($id);

        if (!$mekanik) {
            return response()->json([
                'success' => false,
                'message' => 'Mekanik tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mekanik,
        ]);
    }

    // Ubah data
    public function update(Request $request, string $id)
    {
        $mekanik = Mekanik::find($id);

        if (!$mekanik) {
            return response()->json([
                'success' => false,
                'message' => 'Mekanik tidak ditemukan',
            ], 404);
        }

        $data = $request->validate([
            'Nama_mecanic'           => 'sometimes|required|string|max:255',
            'Alamat_mecanic'         => 'nullable|string',
            'Tgllahir_mecanic'       => 'nullable|date',
            'Tempattgllahir_mecanic' => 'nullable|string|max:255',
            'No_tlpn'                => 'nullable|string|max:255',
            'Email_mecanic'          => 'nullable|email|max:100',
            'Status_job'             => 'nullable|string|max:255',
            'Status_mecanic'         => 'nullable|string|max:255',
            'Updated_by'             => 'nullable|string|max:255',
        ]);

        $mekanik->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Mekanik berhasil diubah',
            'data' => $mekanik,
        ]);
    }

    // Hapus data
    public function destroy(string $id)
    {
        $mekanik = Mekanik::find($id);

        if (!$mekanik) {
            return response()->json([
                'success' => false,
                'message' => 'Mekanik tidak ditemukan',
            ], 404);
        }

        $mekanik->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mekanik berhasil dihapus',
        ]);
    }
}