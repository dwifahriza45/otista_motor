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
                <th scope="col">Keluhan / Keterangan</th>
                <th scope="col">Sparepart</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
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
                <td>{{ $s->keluhan }}</td>
                <td>
                    <div class="row">
                        <div class="col-10">
                            <select class="form-control @error('sparepart1') is-invalid @enderror mb-2" id="sparepart1" name="sparepart1">
                                <option value="">--Pilih--</option>
                                @foreach ($sparepart as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <select class="form-control @error('sparepart2') is-invalid @enderror mb-2 sparepart-select" id="sparepart2" name="sparepart2">
                                <option value="">--Pilih--</option>
                                @foreach ($sparepart as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <a href="" class="sparepart-select" id="close2"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <select class="form-control @error('sparepart3') is-invalid @enderror mb-2 sparepart-select" id="sparepart3" name="sparepart3">
                                <option value="">--Pilih--</option>
                                @foreach ($sparepart as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <a href="" class="sparepart-select" id="close3"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </td>
                <td>Rp. 30.000</td>
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
                                <form action="/admin/service/{{ $s->id }}" method="POST">
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

@section('js')
<script>
    const sparepartSelects = Array.from(document.getElementsByClassName("sparepart-select"));
    const close2 = document.getElementById("close2");
    const close3 = document.getElementById("close3");

    sparepartSelects.forEach((sp, index) => {
        const sparepart = document.getElementById(`sparepart${index + 1}`);

        sp.style.display = "none"; // Move this line inside the loop

        sparepart.addEventListener("change", function() {
            const nextSparepart = document.getElementById(`sparepart${index + 2}`);
            const nextClose = index === 1 ? close3 : close2;

            nextSparepart.style.display = "";
            nextClose.style.display = "";
        });

        const close = index === 1 ? close2 : close3;

        close.addEventListener("click", function() {
            const nextSparepart = document.getElementById(`sparepart${index + 2}`);
            const nextClose = index === 1 ? close3 : close2;

            nextSparepart.style.display = "none";
            nextClose.style.display = "none";
        });
    });
</script>
@endsection