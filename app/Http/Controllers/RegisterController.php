<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'unique' => ':attribute sudah digunakan!!!',
            'numeric' => ':attribute harus berupa angka!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_id'] = 2;
        $validateData['image'] = 'profile/default_profile.jpg';

        User::create($validateData);

        return redirect()->route('register')->with('status', 'Berhasil membuat akun');
    }
}
