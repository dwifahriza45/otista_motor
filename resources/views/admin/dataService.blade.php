@extends('layouts.admin.app')

@section('title', 'Data Service - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Service</h1>
    </div>

    <a href="" class="btn btn-outline-danger mb-2"><i class="fas fa-print"></i> Cetak Data Sparepart</a>

    <input id="myInput" type="search" placeholder="Search" aria-label="Search">

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('reject'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('reject') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table mt-2">
        <thead class="bg-danger text-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Reservasi</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Motor</th>
                <th scope="col">Kilometer</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Sparepart</th>
                <th scope="col">Input Jadwal</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @php $i = 1; @endphp
            @foreach ($service as $s)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td><?php
                    $date = Carbon\Carbon::parse($s->created_at);
                    $formattedDate = $date->translatedFormat('d F Y');
                    echo $formattedDate;
                    ?>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#user{{ $s->this_user->id }}">{{ $s->this_user->name }}</a>

                    <!-- Modal -->
                    <div class="modal fade" id="user{{ $s->this_user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $s->this_user->name }} || <i class="fa-brands fa-whatsapp" style="color: #2bff00;"></i> <a href="">{{ $s->this_user->no_hp }}</a></p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Alamat</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;"><i class="fa-solid fa-house"></i> {{ $s->this_user->alamat }}</p>
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
                    <a href="" data-toggle="modal" data-target="#motor{{ $s->this_bike->id }}">{{ $s->this_bike->nama_motor }}</a>

                    <!-- Modal -->
                    <div class="modal fade" id="motor{{ $s->this_bike->id }}" tabindex="-1" role="dialog" aria-labelledby="motor" aria-hidden="true">
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
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $s->this_bike->nama_motor }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Tipe Motor</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $s->this_bike->this_type->tipe }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Merk Motor</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $s->this_bike->merk }}</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nomor Polisi</p>
                                            <p for="sparepart" style="margin-bottom: -0.5px;">{{ $s->this_bike->no_kendaraan }}</p>
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
                <td>{{ $s->kilometer }} km</td>
                <td>
                    <p style="margin-bottom: -0.5px;" class="text-wrap">
                        <a href="" data-toggle="modal" data-target="#ket{{ $s->id }}">{{ \Illuminate\Support\Str::limit($s->keluhan, 10, $end='...') }}</a>

                        <!-- Modal -->
                    <div class="modal fade" id="ket{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $s->keluhan }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#detailSparepart{{ $s->id }}">Detail</a>

                    <!-- Modal -->
                    <div class="modal fade" id="detailSparepart{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Sparepart</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $s->this_sparepart1->sparepart }} - @currency($s->this_sparepart1->harga)</p>

                                    @if ($s->sparepart2 != null)
                                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $s->this_sparepart2->sparepart }} - @currency($s->this_sparepart2->harga)</p>
                                    @endif

                                    @if ($s->sparepart3 != null)
                                    <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $s->this_sparepart3->sparepart }} - @currency($s->this_sparepart3->harga)</p>
                                    @endif
                                    <hr>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="harga_jasa">Harga Jasa</label>
                                            <input type="number" class="form-control" id="harga_jasa" placeholder="Masukkan harga jasa . . .">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" data-dismiss="modal">Input</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#jadwal{{ $s->id }}">Jadwalkan</a>

                    <!-- Modal -->
                    <div class="modal fade" id="jadwal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Input Jadwal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <input type="datetime-local">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Jadwalkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($s->approve_admin == null && $s->reject_admin == null)
                    <a href="" class="btn btn-success mb-2" data-toggle="modal" data="tooltip" data-placement="top" title="Terima" data-target="#terima{{ $s->id }}"><i class="fas fa-check"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="terima{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Terima Reservasi {{ $s->this_user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menerima reservasi {{ $s->this_user->name }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{ route('approve_admin', $s->id) }}" class="btn btn-success">Terima</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="" class="btn btn-danger mb-2" data-toggle="modal" data="tooltip" data-placement="top" title="Tolak" data-target="#tolak{{ $s->id }}"><i class="fas fa-times"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="tolak{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tolak Reservasi {{ $s->this_user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/service/reject/{{ $s->id }}" method="POST">
                                        @csrf
                                        <p for="reason_reject_admin" style="margin-bottom: -0.5px;" class="font-weight-bold">Alasan Penolakan</p>
                                        <textarea cols="15" rows="5" class="form-control @error('reason_reject_admin') is-invalid @enderror" name="reason_reject_admin" id="reason_reject_admin" placeholder="Berikan alasan penolakan kepada pelanggan . . ."></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($s->approve_admin != null && $s->reject_admin == null)
                    <p style="margin-bottom: -0.5px;" class="text-wrap">Menunggu Konfirmasi Pelanggan</p>
                    @endif

                    @if ($s->approve_admin == null && $s->reject_admin != null)
                    <a href="" data-toggle="modal" data-target="#reason_reject{{ $s->id }}" data="tooltip" data-placement="top" title="Alasan Penolakan" style="margin-bottom: -0.5px;" class="text-wrap">Reservasi Ditolak</a>

                    <!-- Modal -->
                    <div class="modal fade" id="reason_reject{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reservasi {{ $s->this_user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="margin-bottom: -0.5px;" class="font-weight-bold">Alasan Penolakan</p>
                                    <p style="margin-bottom: -0.5px;" class="text-wrap">{{ $s->reason_reject_admin }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection