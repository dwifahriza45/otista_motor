<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sparepart;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnduhKwitansiController extends Controller
{
    public function index($id)
    {
        $unduh = Service::where('id', $id)
            ->whereNotNull('repair_done')
            ->get();

        return view('user/kwitansi/unduh', compact('unduh'));
    }

    public function unduhSparepart() {
        $unduh = Sparepart::get();

        return view('admin/cetak/sparepart', compact('unduh'));
    }

    public function unduhDataService() {
        $service = Service::whereNotNull('in_process')->get();
        return view('admin/cetak/dataService', compact('service'));
    }

    public function unduhDataTransaksiSelesai() {
        $transaksi = Service::whereNull('in_process')->get();
        return view('admin/cetak/transaksiSelesai', compact('transaksi'));
    }

    public function unduhDataPelanggan() {
        $trans = Service::select('user_id', 'admin_id', 'motor_id')
            ->whereNotNull('done')
            ->orderBy('done', 'desc')
            ->distinct()
            ->get();
        return view('admin/cetak/dataPelanggan', compact('trans'));
    }

    public function unduhDataAdmin() {
        $user = User::find(Auth::user()->id);
        $admin = DB::table('users')
            ->where('role_id', 1)
            ->get();

        return view('admin/cetak/dataAdmin', compact('user', 'admin'));
    }
}
