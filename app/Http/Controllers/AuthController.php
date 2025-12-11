<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
    return view('auth.login');
}


    public function login(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Autentikasi
        if (Auth::attempt($validated)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Tulis jika kamu ingin
    }

    public function profile()
    {
        return view('profile');
    }
}
