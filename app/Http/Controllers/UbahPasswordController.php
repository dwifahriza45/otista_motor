<?php

namespace App\Http\Controllers;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user/ubahPasswordUser', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);


        if (Hash::check($request->input('current_password'), auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('status', 'Password berhasil diubah');
        } else {
            return back()->with('fail', 'Password gagal diubah');
        };
    }
}
