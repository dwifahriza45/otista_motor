<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function admin()
    {
        return view('auth/loginAdmin');
    }

    public function authUser(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            } else if ($user->role_id == 2) {
                return redirect()->intended('/home');
            }
        }

        return back()->with('fail', 'Gagal Login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('status', 'Berhasil logout');
    }
}
