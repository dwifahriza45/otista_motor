<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Sparepart;
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

        $cekAntrian = Service::where('repair', null)->whereNotNull('queue')->count();
        
        $cekSparepart = Sparepart::where('active', 1)->count();

        return view('user/service', compact('motor', 'sparepart', 'cekService', 'cekAntrian', 'cekSparepart'));
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

    public function hargaJasa(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'numeric' => ':attribute harus berupa angka!!!',
        ];

        $validateData = $request->validate([
            'harga_jasa' => ['required', 'numeric']
        ], $messages);

        Service::where('id', $id)->update($validateData);

        return redirect()->route('service')->with('status', 'Berhasil menginputkan harga jasa');
    }

    public function approve_admin($id)
    {
        $validateData['admin_id'] = Auth::id();
        $validateData['wait_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['approve_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil terima reservasi');
    }

    public function jadwalkan(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'numeric' => ':attribute harus berupa angka!!!',
        ];

        $validateData = $request->validate([
            'jadwal' => ['required']
        ], $messages);

        // dd($validateData);

        Service::where('id', $id)->update($validateData);

        return redirect()->route('service')->with('status', 'Berhasil menginputkan jadwal');
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
        $validateData['done'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['reject_admin'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil menolak reservasi');
    }

    public function penyerahanMotor($id)
    {
        $validateData['confirm_user'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('notifikasi')->with('status', 'Berhasil melakukan penyerahan motor!');
    }

    public function inputQueue($id)
    {
        $validateData['queue'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil menginputkan motor kedalam antrian!');
    }

    public function inputRepair($id)  {
        $validateData['repair'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil konfirmasi motor kedalam perbaikan!');
    }

    public function inputRepairDone($id)  {
        $validateData['repair_done'] = Carbon::now()->format('Y-m-d H:i:s');
        Service::where('id', $id)->update($validateData);
        return redirect()->route('service')->with('status', 'Berhasil konfirmasi motor selesai perbaikan!');
    }

    public function inputDone($id)  {
        $get = Service::where('id', $id)->get();
        
        $sparepart1 = ($get[0]['sparepart1']);
        $sparepart2 = ($get[0]['sparepart2']);
        $sparepart3 = ($get[0]['sparepart3']);

        $sparepartData1['stok'] = $get[0]['this_sparepart1']['stok'] - 1;
        $sparepartData2['stok'] = $get[0]['this_sparepart2']['stok'] - 1;
        $sparepartData3['stok'] = $get[0]['this_sparepart3']['stok'] - 1;

        $validateData['done'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['in_process'] = null;

        if ($sparepart3 != null) {
            Sparepart::where('id', $sparepart1)->update($sparepartData1);
            Sparepart::where('id', $sparepart2)->update($sparepartData2);
            Sparepart::where('id', $sparepart3)->update($sparepartData3);
            Service::where('id', $id)->update($validateData);
            return redirect()->route('service')->with('status', 'Berhasil konfirmasi motor selesai perbaikan!');
        }

        if ($sparepart2 != null) {
            Sparepart::where('id', $sparepart1)->update($sparepartData1);
            Sparepart::where('id', $sparepart2)->update($sparepartData2);
            Service::where('id', $id)->update($validateData);
            return redirect()->route('service')->with('status', 'Berhasil konfirmasi motor selesai perbaikan!');
        }

        if ($sparepart1 != null) {
            Sparepart::where('id', $sparepart1)->update($sparepartData1);
            Service::where('id', $id)->update($validateData);
            return redirect()->route('service')->with('status', 'Berhasil konfirmasi motor selesai perbaikan!');
        }
    }

    public function batal_user(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $validateData = $request->validate([
            'reason_reject_user' => 'required',
        ], $messages);

        $validateData['in_process'] = null;
        $validateData['done'] = Carbon::now()->format('Y-m-d H:i:s');
        $validateData['reject_user'] = Carbon::now()->format('Y-m-d H:i:s');

        Service::where('id', $id)->update($validateData);
        return redirect()->route('notifikasi')->with('status', 'Berhasil membatalkan reservasi');
    }
}
