<?php

namespace App\Http\Controllers;
use App\Sparepart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SparepartController extends Controller
{
    public function index()
    {
        return view('admin/sparepart/tambahSparepart');
    }

    public function addSparepart(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'unique' => ':attribute sudah digunakan!!!',
            'numeric' => ':attribute harus berupa angka!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $validateData = $request->validate([
            'sparepart' => 'required',
            'stok' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
        ], $messages);

        $validateData['active'] = 0;


        Sparepart::create($validateData);
        
        return redirect()->route('sparepart')->with('status', 'Berhasil menambah sparepart');
    }

    public function updateSparepart($id)
    {
        $data = Sparepart::find($id);
        return view('admin/sparepart/ubahSparepart', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'unique' => ':attribute sudah digunakan!!!',
            'numeric' => ':attribute harus berupa angka!!!',
            'confirmed' => ':attribute tidak sama!',
        ];

        $validateData = $request->validate([
            'sparepart' => 'required',
            'stok' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
        ], $messages);

        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        Sparepart::where('id', $id)
            ->update($validateData); 

        return redirect()->route('sparepart')->with('status', 'Berhasil mengubah sparepart');
    }

    public function active($id)
    {
        $data = Sparepart::find($id);
        $validateData['active'] = 1;
        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $data->update($validateData);
        return redirect()->route('sparepart')->with('status', 'Sparepart berhasil diubah!');
    }

    public function nonaktif($id)
    {
        $data = Sparepart::find($id);
        $validateData['active'] = 0;
        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $data->update($validateData);
        return redirect()->route('sparepart')->with('status', 'Sparepart berhasil diubah!');
    }

    public function delete($id)
    {
        $data = Sparepart::find($id);
        $data->delete();
        return redirect()->route('sparepart')->with('status', 'Sparepart berhasil dihapus!');
    }
}
