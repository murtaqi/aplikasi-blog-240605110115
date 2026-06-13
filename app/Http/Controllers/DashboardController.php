<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nama_lengkap = $user->nama_depan . ' ' . $user->nama_belakang;
        $waktu_login = session('waktu_login', now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y | HH:mm'));

        return view('dashboard.index', compact('nama_lengkap', 'waktu_login'));
    }
}
