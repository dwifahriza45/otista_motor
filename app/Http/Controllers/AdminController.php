<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function sparepart()
    {
        return view('admin/dataSparepart');
    }

    public function service()
    {
        return view('admin/dataService');
    }

    public function pelanggan()
    {
        return view('admin/dataPelanggan');
    }

    public function dataAdmin()
    {
        return view('admin/dataAdmin');
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
