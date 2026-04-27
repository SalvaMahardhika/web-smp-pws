<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        if (session('role') !== 'super_admin') {
            abort(403);
        }

        $users = User::where('role', 'admin')->get();

        return view('kelolaakun', compact('users'));
    }

    // =========================
    // STORE
    // =========================
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
            'password' => $request->password, // auto hash dari model
            'role' => 'admin',
            'status' => 1
        ]);

        return back()->with('success', 'Admin berhasil ditambahkan');
    }

    // =========================
    // UPDATE
    // =========================
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

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $result = User::deleteUser($id);

        // kalau user yang login ikut dihapus
        if ($result['logout']) {
            session()->flush();
            return redirect('/')->with('success', 'Akun Anda telah dihapus');
        }

        return back()->with('success', 'Admin berhasil dihapus');
    }

    // =========================
    // UPDATE STATUS
    // =========================
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