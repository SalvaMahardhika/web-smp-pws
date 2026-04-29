<?php

namespace App\Models\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthModel
{
    // login logic
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

    // update profile logic
    public static function updateProfile($request)
    {
        $user = User::find(session('id_user'));

        if (!$user) {
            return [
                'status' => false,
                'message' => 'User tidak ditemukan'
            ];
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return [
            'status' => true,
            'data' => $user
        ];
    }
}