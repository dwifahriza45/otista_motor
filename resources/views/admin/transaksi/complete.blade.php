@extends('layouts.admin.app')

@section('title', 'Data Service - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi Selesai</h1>
    </div>

    <a href="" class="btn btn-outline-danger mb-2"><i class="fas fa-print"></i> Cetak Data Transaksi Selesai</a>

    <input id="myInput" type="search" placeholder="Search" aria-label="Search">

    <table class="table mt-2">
        <thead class="bg-danger text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Reservasi</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Nama Admin</th>
                <th scope="col">Motor</th>
                <th scope="col">Sparepart</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($transaksi as $t)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>
                    <?php
                    $date = Carbon\Carbon::parse($t->created_at);
                    $formattedDate = $date->translatedFormat('d F Y');
                    echo $formattedDate;
                    ?>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#user{{ $t->this_user->id }}">{{ $t->this_user->name }}</a>

                    <!-- Modal -->
                    <div class="modal fade" id="user{{ $t->this_user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Pelanggan</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_user->name }} || <i class="fa-brands fa-whatsapp" style="color: #2bff00;"></i> <a href="">{{ $t->this_user->no_hp }}</a></p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Alamat</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;"><i class="fa-solid fa-house"></i> {{ $t->this_user->alamat }}</p>
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
                <td>
                    <a href="" data-toggle="modal" data-target="#admin{{ $t->this_admin->id }}">{{ $t->this_admin->name }}</a>

                    <!-- Modal -->
                    <div class="modal fade" id="admin{{ $t->this_admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Admin</p>
                                    <p for="sparepart" style="margin-bottom: -0.5px;">{{ $t->this_admin->name }} || <i class="fa-brands fa-whatsapp" style="color: #2bff00;"></i> <a href="">{{ $t->this_admin->no_hp }}</a></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
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
                <td>
                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $t->this_sparepart1->sparepart }} - @currency($t->this_sparepart1->harga)</p>

                    @if ($t->sparepart2 != null)
                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $t->this_sparepart2->sparepart }} - @currency($t->this_sparepart2->harga)</p>
                    @endif

                    @if ($t->sparepart3 != null)
                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $t->this_sparepart3->sparepart }} - @currency($t->this_sparepart3->harga)</p>
                    @endif
                </td>
                <td>
                    @if ($t->approve_admin == null && $t->reject_admin != null)
                    <a href="" data-toggle="modal" data-target="#reason_reject{{ $t->id }}" data="tooltip" data-placement="top" title="Alasan Penolakan" style="margin-bottom: -0.5px;" class="text-wrap">Reservasi Ditolak</a>

                    <!-- Modal -->
                    <div class="modal fade" id="reason_reject{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reservasi {{ $t->this_user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="margin-bottom: -0.5px;" class="font-weight-bold">Alasan Penolakan</p>
                                    <p style="margin-bottom: -0.5px;" class="text-wrap">{{ $t->reason_reject_admin }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <a href="">Selesai</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection