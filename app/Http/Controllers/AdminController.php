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
        $countAdmin = User::where('role_id', 1)
            ->count();
        $countPelanggan = User::where('role_id', 2)
            ->count();
        $countQueu = Service::where('repair', null)->whereNotNull('queue')->count();

        $countRepair = Service::whereNotNull('repair')->whereNull('repair_done')->count();

        $countRepairDone = Service::whereNotNull('repair_done')->count();

        $totalReservasi = Service::count();

        $service = Service::whereNotNull('in_process')->get();

        $countService = Service::whereNotNull('in_process')->count();

        $reservasiTolak = Service::whereNull('approve_admin')->whereNotNull('reject_admin')->count();

        $reservasiBatal = Service::whereNull('in_process')->whereNotNull('reject_user')->count();

        $reservasiSelesai = Service::whereNotNull('repair_done')->whereNotNull('done')->count();

        return view('admin/dashboard', compact('countAdmin', 'countPelanggan', 'countQueu', 'service', 'reservasiTolak', 'reservasiBatal', 'reservasiSelesai', 'countRepair', 'countRepairDone', 'totalReservasi', 'countService'));
    }

    public function sparepart()
    {
        $sparepart = DB::table('spareparts')->get();
        return view('admin/dataSparepart', compact('sparepart'));
    }

    public function service()
    {
        $service = Service::whereNotNull('in_process')->get();
        return view('admin/dataService', compact('service'));
    }

    public function pelanggan()
    {
        $trans = Service::select('user_id', 'admin_id', 'motor_id')
            ->whereNotNull('done')
            ->orderBy('done', 'desc')
            ->distinct()
            ->get();
        return view('admin/dataPelanggan', compact('trans'));
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
