<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Service;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $motor = DB::table('motor')
            ->where('user_id', $userId)
            ->get();
        $sparepart = DB::table('spareparts')
            ->where('active', 1)
            ->get();

        $cekService = Service::where('user_id', $userId)
            ->whereNotNull('in_process')
            ->count();

        return view('user/service', compact('motor', 'sparepart'))
            ->with('cekService', $cekService);
    }

    public function createService(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'unique' => ':attribute sudah digunakan!!!',
            'numeric' => ':attribute harus berupa angka!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $validateData = $request->validate([
            'user_id' => ['required'],
            'motor_id' => ['required'],
            'kilometer' => ['required'],
            'sparepart1' => ['required'],
            'sparepart2' => [],
            'sparepart3' => [],
            'keluhan' => ['required'],
        ], $messages);

        $validateData['in_process'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['wait_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        
        Service::create($validateData);

        return redirect()->route('serviceUser')->with('status', 'Berhasil melakukan reservasi service motor');
    }

    public function approve_admin($id)
    {
        $validateData['admin_id'] = Auth::id();
        $validateData['wait_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['approve_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil terima reservasi');
    }

    public function reject_admin(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];
        
        $validateData = $request->validate([
            'reason_reject_admin' => 'required',
        ], $messages);

        $validateData['admin_id'] = Auth::id();
        $validateData['in_process'] = null;
        $validateData['wait_admin'] = null;
        $validateData['reject_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil menolak reservasi');
    }
}
