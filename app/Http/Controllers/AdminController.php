<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Service;
use App\Sparepart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function sparepart()
    {
        $sparepart = DB::table('spareparts')->get();
        return view('admin/dataSparepart', compact('sparepart'));
    }

    public function service()
    {
        $service = Service::whereNotNull('in_process')->get();
        // dd($service);
        return view('admin/dataService', compact('service'));
    }

    public function pelanggan()
    {
        return view('admin/dataPelanggan');
    }

    public function dataAdmin()
    {
        $user = User::find(Auth::user()->id);
        $admin = DB::table('users')
                ->where('role_id', 1)
                ->get();

        return view('admin/dataAdmin', compact('user', 'admin'));
    }

    public function tambahAdmin()
    {
        $user = User::find(Auth::user()->id);
        return view('admin/tambahAdmin', compact('user'));
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
        $validateData['role_id'] = 1;
        $validateData['image'] = 'profile/default_profile.png';

        User::create($validateData);

        return redirect()->route('tambahAdmin')->with('status', 'Berhasil membuat akun');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('dataAdmin')->with('status', 'Admin berhasil dihapus!');
    }

    public function profileAdmin()
    {
        $user = User::find(Auth::user()->id);
        return view('admin/profileAdmin', compact('user'));
    }

    public function ubahPasswordAdmin()
    {
        $user = User::find(Auth::user()->id);
        return view('admin/ubahPasswordAdmin', compact('user'));
    }
}
