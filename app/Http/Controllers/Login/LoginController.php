<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login\AuthModel;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

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

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}