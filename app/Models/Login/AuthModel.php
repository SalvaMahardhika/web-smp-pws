<?php

namespace App\Models\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthModel
{
    // Logika Login
    public static function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->status == 0) {
                return [
                    'status' => false,
                    'message' => 'Akun dinonaktifkan!'
                ];
            }

            return [
                'status' => true,
                'data' => $user
            ];
        }

        return [
            'status' => false,
            'message' => 'Email atau password salah!'
        ];
    }

    // Logika Update Profile & Ubah Password
    public static function updateProfile($request)
    {
        $user = User::find(session('id_user'));

        if (!$user) {
            return [
                'status' => false,
                'message' => 'User tidak ditemukan'
            ];
        }

        // --- VALIDASI PASSWORD LAMA ---
        // Jika user mengisi field password baru, maka password lama wajib dicek
        if ($request->filled('password')) {
            
            // 1. Cek apakah password lama diisi di form
            if (!$request->filled('old_password')) {
                return [
                    'status' => false,
                    'message' => 'Password lama wajib diisi jika ingin mengubah password.'
                ];
            }

            // 2. Verifikasi apakah password lama cocok dengan database
            if (!Hash::check($request->old_password, $user->password)) {
                return [
                    'status' => false,
                    'message' => 'Password lama yang Anda masukkan salah!'
                ];
            }

            // 3. Jika cocok, baru di-hash password barunya
            $user->password = Hash::make($request->password);
        }

        // Update Nama dan Email
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return [
            'status' => true,
            'data' => $user
        ];
    }
}