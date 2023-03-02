<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        return view('user/motor');
    }
}
