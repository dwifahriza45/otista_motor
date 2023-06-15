@extends('layouts.admin.app')

@section('title', 'Data Pelanggan - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
    </div>

    <a href="" class="btn btn-outline-danger mb-2"><i class="fas fa-print"></i> Cetak Data Pelanggan</a>

    <table class="table mt-2">
        <thead class="bg-danger text-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Motor</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Terakhir Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($trans as $t)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $t->this_user->name }}</td>
                <td>
                    <a href="" data-toggle="modal" data-target="#motor{{ $t->this_bike->id }}">{{ $t->this_bike->nama_motor }}</a>

                    <!-- Modal -->
                    <div class="modal fade" id="motor{{ $t->this_bike->id }}" tabindex="-1" role="dialog" aria-labelledby="motor" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="motor">Data Motor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Motor</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_bike->nama_motor }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Tipe Motor</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_bike->this_type->tipe }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Merk Motor</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_bike->merk }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nomor Polisi</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_bike->no_kendaraan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{ $t->this_user->alamat }}</td>
                <td>{{ $t->this_user->no_hp }}</td>
                <td>@mdo</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection