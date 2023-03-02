@extends('layouts.admin.app')

@section('title', 'Data Sparepart - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sparepart</h1>
    </div>

    <a href="" class="btn btn-danger mb-2 mr-2"><i class="fas fa-plus"></i> Tambah Data Sparepart</a>
    <a href="" class="btn btn-outline-danger mb-2"><i class="fas fa-print"></i> Cetak Data Sparepart</a>

    <table class="table mt-2">
        <thead class="bg-danger text-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Sparepart</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
                <th scope="col">Aktif / Nonaktif</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <a href="" class="btn btn-success mb-2"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger mb-2"><i class="fas fa-trash"></i> Hapus</a>
                </td>
                <td>
                    <a href="" class="btn btn-success mb-2">Aktif</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection