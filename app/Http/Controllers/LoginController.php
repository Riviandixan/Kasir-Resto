<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authanticate(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('dashboard');
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->role == 'kasir') {
                return redirect()->route('transaksi.index');
            } elseif (Auth::user()->role == 'manajer') {
                return redirect()->route('menu.index');
            }
        }
        return redirect('/')->with('loginError', 'Login gagal! Silahkan coba lagi');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
