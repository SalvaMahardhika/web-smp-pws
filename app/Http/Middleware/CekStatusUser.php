<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CekStatusUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('login')) {

            $user = User::where('id_user', session('id_user'))->first();

            // 🔥 kalau status OFF
            if ($user && $user->status == 0) {

                // logout paksa
                session()->flush();

                // 🔥 redirect ke beranda user
                return redirect('/')
                    ->with('error', 'Akun Anda dinonaktifkan!');
            }
        }

        return $next($request);
    }
}