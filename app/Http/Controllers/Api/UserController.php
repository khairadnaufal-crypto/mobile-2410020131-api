<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id'           => 'required|string|max:100|unique:users,id',
            'username'     => 'required|string|max:255|unique:users,username',
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users,email',
            'no_hp'        => 'nullable|string|max:255',
            'password'     => 'required|string|min:6',
            'role'         => 'nullable|string|max:255',
        ]);

        return response()->json(User::create($data), 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'username'     => 'sometimes|required|string|max:255|unique:users,username,' . $user->id . ',id',
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'email'        => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id . ',id',
            'no_hp'        => 'nullable|string|max:255',
            'password'     => 'sometimes|required|string|min:6',
            'role'         => 'nullable|string|max:255',
        ]);

        $user->update($data);

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->noContent();
    }
}