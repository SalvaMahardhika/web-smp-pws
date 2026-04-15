<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function index()
    {
        if (session('role') !== 'super_admin') {
            abort(403);
        }

        $users = User::where('role', 'admin')->get();

        return view('kelolaakun', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // tetap (sudah auto hash di model)
            'role' => 'admin',
            'status' => 1
        ]);

        return back()->with('success', 'Admin berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Admin berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success', 'Admin berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->status = $request->status;
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }
}