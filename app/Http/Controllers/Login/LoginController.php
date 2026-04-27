<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login\AuthModel;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // =========================
    // HALAMAN LOGIN
    // =========================
    public function index()
    {
        // 🔥 kalau sudah login, langsung redirect
        if (session('login') && in_array(session('role'), ['admin', 'super_admin'])) {
            return redirect('/'); // bisa diganti ke dashboard kalau ada
        }

        return view('login.login');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $result = AuthModel::login($request);

        // ❌ LOGIN GAGAL
        if (!$result['status']) {
            return back()->with('error', $result['message'] ?? 'Email atau Password salah');
        }

        $user = $result['data'];

        // =========================
        // SET SESSION LOGIN
        // =========================
        Session::put('login', true);
        Session::put('id_user', $user->id_user);
        Session::put('name', $user->name);
        Session::put('role', $user->role);

        return redirect('/');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    // =========================
    // UPDATE PROFILE
    // =========================
    public function updateProfile(Request $request)
    {
        $user = User::find(session('id_user'));

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        // update nama
        $user->name = $request->name;

        // update password jika diisi
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // update session
        Session::put('name', $user->name);

        return back()->with('success', 'Profile berhasil diupdate');
    }
}