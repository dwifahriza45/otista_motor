<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;


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

        $validateData['image'] = 'profile/default_profile.png';
        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_id'] = 2;
        $validateData['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        User::create($validateData);

        return redirect()->route('register')->with('status', 'Berhasil membuat akun');
    }
}
