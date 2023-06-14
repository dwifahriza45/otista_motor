<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user/profileUser', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'numeric' => ':attribute harus berupa angka!!!',
        ];

        $request->validate([
            'name' => 'required',
            'alamat' => ['required'],
            'no_hp' => ['required', 'numeric'],
        ], $messages);

        $user->name = $request->input('name');
        $user->alamat = $request->input('alamat');
        $user->no_hp = $request->input('no_hp');

        $user->save();
        return redirect()->route('profileUser')->with('status', 'Ubah Profile Berhasil');
    }

    public function updateAdmin(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'numeric' => ':attribute harus berupa angka!!!',
        ];

        $request->validate([
            'name' => 'required',
            'no_hp' => ['required', 'numeric'],
        ], $messages);

        $user->name = $request->input('name');
        $user->no_hp = $request->input('no_hp');

        $user->save();

        if (auth()->user()->role_id == 2) {
            return redirect()->route('profileUser')->with('status', 'Ubah Profile Berhasil');
        } else if (auth()->user()->role_id == 1) {
            return redirect()->route('profileAdmin')->with('status', 'Ubah Profile Berhasil');
        }
    }
}
