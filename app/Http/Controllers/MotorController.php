<?php

namespace App\Http\Controllers;
use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MotorController extends Controller
{
    public function index()
    {
        $motor = Motor::All();
        return view('user/motor', compact('motor'));
    }

    public function motor()
    {
        $data = DB::table('motor_type')->get();
        return view('user/motor/tambah', compact('data'));
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'unique' => ':attribute sudah digunakan!!!',
            'numeric' => ':attribute harus berupa angka!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $validateData = $request->validate([
            'nama_motor' => 'required',
            'merk' => 'required',
            'tipe_id' => 'required',
            'no_kendaraan' => 'required',
        ], $messages);

        $validateData['user_id'] = Auth::user()->id;

        Motor::create($validateData);

        return redirect()->route('motor')->with('status', 'Berhasil menambah motor');
    }

    public function updateMotor($id)
    {
        $data = Motor::find($id);
        $tipe = DB::table('motor_type')->get();
        return view('user/motor/ubah', compact('data'), compact('tipe'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $validateData = $request->validate([
            'nama_motor' => 'required',
            'merk' => 'required',
            'no_kendaraan' => 'required',
        ], $messages);

        $validateData['tipe_id'] = $request->input('tipe_id');
        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        Motor::where('id', $id)->update($validateData);
        
        return redirect()->route('motor')->with('status', 'Berhasil mengubah motor');
    }

    public function delete($id)
    {
        $data = Motor::find($id);
        $data->delete();
        return redirect()->route('motor')->with('status', 'Motor berhasil dihapus!');
    }
}
