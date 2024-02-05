<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, arahkan ke dashboard
            return redirect()->route('admin.dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }

        public function dashboard()
    {
        return view('admin.dashboard');
    }
}
