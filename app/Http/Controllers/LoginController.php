<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'user_name' => $request->user_name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Simpan waktu login di session
            $waktuLogin = now()->timezone('Asia/Jakarta')
                ->locale('id')
                ->isoFormat('dddd, D MMMM Y | HH:mm');
            session(['waktu_login' => $waktuLogin]);

            return redirect()->route('dashboard')
                ->with('sukses', 'Login berhasil! Selamat datang.');
        }

        return redirect()->back()
            ->withInput($request->only('user_name'))
            ->with('gagal', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('sukses', 'Anda telah berhasil keluar.');
    }
}
