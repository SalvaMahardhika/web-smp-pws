<?php

namespace App\Models\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthModel
{
    public static function login($request)
    {
        // cari user
        $user = User::where('email', $request->email)->first();

        // cek user + password
        if ($user && Hash::check($request->password, $user->password)) {

            // 🔥 CEK STATUS USER
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
}