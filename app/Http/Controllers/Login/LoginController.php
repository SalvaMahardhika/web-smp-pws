<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login\AuthModel;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // halaman login
    public function index()
    {
        if (session('login') && in_array(session('role'), ['admin', 'super_admin'])) {
            return redirect('/');
        }

        return view('login.login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = AuthModel::login($request);

        if (!$result['status']) {
            return back()->with('error', $result['message']);
        }

        $user = $result['data'];

        Session::put('login', true);
        Session::put('id_user', $user->id_user);
        Session::put('name', $user->name);
        Session::put('email', $user->email);
        Session::put('role', $user->role);

        return redirect('/');
    }

    // logout
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    // update profile
    // update profile logic
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $result = AuthModel::updateProfile($request);

        // Jika result status false (karena password lama salah), kembali dengan pesan error
        if (!$result['status']) {
            return back()->with('error', $result['message']);
        }

        $user = $result['data'];

        // Update session agar navbar langsung berubah secara real-time
        \Illuminate\Support\Facades\Session::put('name', $user->name);
        \Illuminate\Support\Facades\Session::put('email', $user->email);

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}