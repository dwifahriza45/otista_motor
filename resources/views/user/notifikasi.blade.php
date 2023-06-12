@extends('layouts.login.app')

@section('title', 'Halaman Notifikasi - Otista Motor')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #78221c"><b>{{ __('Notifikasi Service') }}</b></div>
                 
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @foreach ($notif as $n)
                <div class="card-body">
                    <form action="">
                        <div class="row justify-content-around">
                            <div class="col-md-6">
                                <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Pelanggan</p>
                                <p for="" style="margin-bottom: -0.5px;">{{ $n->this_user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Admin</p>
                                @if ( $n->admin_id != null )
                                <p for="" style="margin-bottom: -0.5px;">{{ $n->this_admin->name }} || <i class="fa-brands fa-whatsapp" style="color: #2bff00;"></i> <a href="">{{ $n->this_admin->no_hp }}</a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-around mt-3">
                            <div class="col-md-6">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Motor</p>
                                <a href="" style="margin-bottom: -0.5px;" data-toggle="modal" data-target="#motor{{ $n->this_bike->id }}">{{ $n->this_bike->nama_motor }}</a>

                                <!-- Modal -->
                                <div class="modal fade" id="motor{{ $n->this_bike->id }}" tabindex="-1" role="dialog" aria-labelledby="motor" aria-hidden="true">
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
                                                        <p for="sparepart" style="margin-bottom: -0.5px;">{{ $n->this_bike->nama_motor }}</p>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Tipe Motor</p>
                                                        <p for="sparepart" style="margin-bottom: -0.5px;">{{ $n->this_bike->this_type->tipe }}</p>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Merk Motor</p>
                                                        <p for="sparepart" style="margin-bottom: -0.5px;">{{ $n->this_bike->merk }}</p>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Nomor Polisi</p>
                                                        <p for="sparepart" style="margin-bottom: -0.5px;">{{ $n->this_bike->no_kendaraan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Kilometer</p>
                                <p for="sparepart" style="margin-bottom: -0.5px;">{{ $n->kilometer }} km</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Keluhan / Keterangan</p>
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $n->keluhan }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Total Harga</p>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="sparepart">
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Status</p>
                                @if ($n->wait_admin == null)
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">Menunggu Konfirmasi Admin</p>
                                @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Alasan Penolakan</p>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="sparepart">
                            </div>
                            <div class="col-md-6 mt-3">
                                <button type="button" class="btn btn-success btn-block font-weight-bold" data-toggle="modal" data-target="#exampleModal">Konfirmasi</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penyerahan Motor</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin mengkonfirmasi penyerahan <b>Motor!</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <button type="button" class="btn btn-danger btn-block font-weight-bold" data-toggle="modal" data-target="#batal">Batal</button>

                                <!-- Modal -->
                                <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Batal Reservasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin membatalkan reservasi <b>Motor!</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection