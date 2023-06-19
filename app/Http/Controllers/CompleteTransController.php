<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Service;

class CompleteTransController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $transaksi = Service::where('user_id', $userId)
                ->whereNull('in_process')
                ->get();
        return view('user/transaksi/complete', compact('transaksi'));
    }

    public function transAdmin()
    {
        $transaksi = Service::whereNull('in_process')->get();
        return view('admin/transaksi/complete', compact('transaksi'));
    }
}
