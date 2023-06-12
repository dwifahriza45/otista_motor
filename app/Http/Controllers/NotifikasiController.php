<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Service;

class NotifikasiController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $notif = Service::where('user_id', $userId)->get();
        return view('user/notifikasi', compact('notif'));
    }
}
