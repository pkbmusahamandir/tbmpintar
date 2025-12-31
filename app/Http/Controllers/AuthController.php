<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ Wajib: untuk fungsi Auth

class AuthController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Keamanan session
            return redirect()->intended('/dashboard'); // Arahkan ke dashboard
        }

        return back()->with('loginError', 'Login Gagal, Periksa kembali Akun Anda!');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
