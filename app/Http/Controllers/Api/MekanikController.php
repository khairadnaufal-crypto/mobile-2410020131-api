<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    public function index()
    {
        return Mekanik::all();
    }

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

        return response()->json(Mekanik::create($data), 201);
    }

    public function show($id)
    {
        return Mekanik::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $mekanik = Mekanik::findOrFail($id);

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

        return $mekanik;
    }

    public function destroy($id)
    {
        $mekanik = Mekanik::findOrFail($id);
        $mekanik->delete();

        return response()->noContent();
    }
}