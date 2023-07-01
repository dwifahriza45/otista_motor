@extends('layouts.login.app')

@section('title', 'Halaman Data Motor - Otista Motor')

@section('content')
<!-- Content -->
<div>
    <p class="h3 text-bold text-center mt-3">DATA MOTOR</p>
    <hr class="mb-3" style="width: 400px; background-color: #000; height: 2px" />
</div>

<div class="container">
    <a href="{{ route('getMotor') }}" class="btn text-light mb-3" style="background-color: #78221c;">
        <i class="fa-solid fa-plus"></i> Tambah Data Motor
    </a>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        @foreach ($motor as $m)
        @if ($m->user_id == Auth::user()->id)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top img-fluid" style="height: 300px;" src="{{ URL::asset('img/motor/motor.jpg') }}" alt="motor">
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">{{ $m->nama_motor }}</h5>
                    <ul>
                        <li>Merk Motor: {{ $m->merk }}</li>
                        <li>Tipe Motor: {{ $m->this_type->tipe }}</li>
                        <li>Nomor Kendaraan: {{ $m->no_kendaraan }}</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('updateMotor', $m->id) }}" class="btn btn-block btn-success" data="tooltip" data-placement="top" title="Ubah"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                        </div>
                        <div class="col-md-6">
                            <a href="" class="btn btn-block btn-danger" data-toggle="modal" data="tooltip" data-placement="top" title="Hapus" data-target="#delete{{ $m->id }}"><i class="fa-solid fa-trash"></i> Hapus</a>

                            <!-- Modal hapus -->
                            <div class="modal fade" id="delete{{ $m->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapus-motor">Hapus Data Motor {{ $m->nama_motor }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data motor <b>{{ $m->nama_motor }}</b> tersebut!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('hapusMotor', $m->id) }}" class="btn text-light" style="background-color: #78221c"><i class="fa-solid fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal hapus -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<!-- End Content -->
@endsection