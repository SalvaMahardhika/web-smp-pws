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

            $user = User::find(session('id_user'));

            // user tidak ada
            if (!$user) {
                session()->flush();
                return redirect('/')->with('error', 'Akun tidak ditemukan');
            }

            // status nonaktif
            if ($user->status == 0) {
                session()->flush();
                return redirect('/')->with('error', 'Akun dinonaktifkan');
            }
        }

        return $next($request);
    }
}