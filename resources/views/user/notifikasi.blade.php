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

                @foreach ($notif as $n)
                <div class="card-body">
                    <form action="">
                        <div class="row justify-content-around">
                            <div class="col-md-6">
                                <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Pelanggan</p>
                                <p for="" style="margin-bottom: -0.5px;">{{ $n->this_user->name }}</p>
                            </div>
                            @if ( $n->admin_id != null )
                            <div class="col-md-6">
                                <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Admin</p>
                                <p for="" style="margin-bottom: -0.5px;">{{ $n->this_admin->name }} || <i class="fa-brands fa-whatsapp" style="color: #2bff00;"></i> <a href="">{{ $n->this_admin->no_hp }}</a></p>
                            </div>
                            @else
                            <div class="col-md-6">
                            </div>
                            @endif
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
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Keterangan</p>
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $n->keluhan }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Sparepart</p>
                                <a href="" data-toggle="modal" data-target="#detailSparepart{{ $n->id }}">Detail</a>

                                <!-- Modal -->
                                <div class="modal fade" id="detailSparepart{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Sparepart</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $n->this_sparepart1->sparepart }}</p>

                                                @if ($n->sparepart2 != null)
                                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $n->this_sparepart2->sparepart }}</p>
                                                @endif

                                                @if ($n->sparepart3 != null)
                                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $n->this_sparepart3->sparepart }}</p>
                                                @endif
                                                <hr>
                                                <p>Harga Jasa</p>
                                                <p>Total Harga</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="font-weight-bold">Status</p>

                                @if ($n->wait_admin != null && $n->approve_admin == null)
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">Menunggu Konfirmasi Admin</p>
                                @endif

                                @if ($n->wait_admin == null && $n->reject_admin != null)
                                <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">Reservasi ditolak <a href="">Alasan Penolakan</a></p>
                                @endif

                            </div>
                            <div class="col-md-6 mt-3"></div>
                        </div>
                        <div class="row justify-content-around mt-3">
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
                                                <form action="" method="POST">
                                                    @csrf
                                                    <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Alasan Pembatalan</p>
                                                    <textarea cols="15" rows="5" class="form-control @error('') is-invalid @enderror" name="" id="" placeholder="Berikan alasan pembatalan kepada admin . . ."></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Konfirmasi</button>
                                                </form>
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