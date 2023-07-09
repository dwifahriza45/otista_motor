<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriSparepart;
use Carbon\Carbon;

class KategoriSparepartController extends Controller
{
    public function index()
    {
        return view('admin/kategori_sparepart/tambahKategoriSparepart');
    }

    public function addSparepart(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $validateData = $request->validate([
            'kategori' => 'required',
        ], $messages);

        KategoriSparepart::create($validateData);
        
        return redirect()->route('kategoriSparepart')->with('status', 'Berhasil menambah kategori sparepart');
    }

    public function updateKategoriSparepart($id)
    {
        $data = KategoriSparepart::find($id);
        return view('admin/kategori_sparepart/ubahKategoriSparepart', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $validateData = $request->validate([
            'kategori' => 'required',
        ], $messages);

        $validateData['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        KategoriSparepart::where('id', $id)
            ->update($validateData); 

        return redirect()->route('kategoriSparepart')->with('status', 'Berhasil mengubah kategori sparepart');
    }
}
