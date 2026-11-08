<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Lihat semua data
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => User::all(),
        ]);
    }

    // Tambah data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'id'           => 'required|string|max:100|unique:users,id',
            'username'     => 'required|string|max:255|unique:users,username',
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:users,email',
            'no_hp'        => 'nullable|string|max:255',
            'password'     => 'required|string|min:6',
            'role'         => 'nullable|string|max:255',
        ]);

        $user = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil ditambahkan',
            'data' => $user,
        ], 201);
    }

    // Lihat satu data berdasarkan id
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }

    // Ubah data
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 404);
        }

        $data = $request->validate([
            'username'     => 'sometimes|required|string|max:255|unique:users,username,' . $id . ',id',
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'email'        => 'sometimes|required|email|max:255|unique:users,email,' . $id . ',id',
            'no_hp'        => 'nullable|string|max:255',
            'password'     => 'sometimes|required|string|min:6',
            'role'         => 'nullable|string|max:255',
        ]);

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil diubah',
            'data' => $user,
        ]);
    }

    // Hapus data
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus',
        ]);
    }
}