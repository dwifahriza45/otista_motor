<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function authUser(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'email' => ':attribute wajib diisi!!!',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == 2) {
                return redirect()->intended('/home');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('fail', 'Gagal Login');
            }
        }

        return back()->with('fail', 'Gagal Login');
    }

    public function admin()
    {
        return view('auth/loginAdmin');
    }

    public function postLogin(Request $request)
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
            } else {
                Auth::logout();
                return redirect()->route('loginAdmin')->with('fail', 'Gagal Login');
            }
        }
        
        return back()->with('fail', 'Gagal Login');
    }

    public function logout()
    {
        $user = Auth::user();
        Auth::logout();

        if ($user->role_id == 1) {
            return redirect()->route('loginAdmin')->with('status', 'Berhasil logout');
        }

        if ($user->role_id == 2) {
            return redirect()->route('login')->with('status', 'Berhasil logout');
        }
    }
}
