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

        // cek password
        if ($user && Hash::check($request->password, $user->password)) {
            return [
                'status' => true,
                'data' => $user
            ];
        }

        return [
            'status' => false
        ];
    }
}