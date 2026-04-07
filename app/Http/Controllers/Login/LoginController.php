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
    // halaman login
    public function index()
    {
        return view('login.login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $result = AuthModel::login($request);

        if ($result['status']) {

            $user = $result['data'];

            Session::put('login', true);
            Session::put('id_user', $user->id_user);
            Session::put('name', $user->name);
            Session::put('role', $user->role);

            return redirect('/');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    // logout
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    // =========================
    // UPDATE PROFILE (INI FIX NOT FOUND)
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