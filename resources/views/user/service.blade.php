@extends('layouts.login.app')

@section('title', 'Halaman Service - Otista Motor')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card">
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
                <div class="card-header text-white text-center" style="background-color: #78221c"><b>{{ __('Service') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createService') }}">
                        @csrf
                        <div class="row justify-content-around">
                            <div class="col-md-6">
                                <p for="" style="margin-bottom: -0.5px;" class="font-weight-bold">Nama Pelanggan</p>
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                <p for="" style="margin-bottom: -0.5px;">{{ auth()->user()->name }}</p>
                            </div>
                            <div class="col-md-6">
                                @if ($motor->count() > 0)
                                <p for="motor_id" style="margin-bottom: -0.5px;" class="font-weight-bold">Motor</p>
                                <select class="form-control @error('motor_id') is-invalid @enderror" id="motor_id" name="motor_id">
                                    @foreach ($motor as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_motor }}</option>
                                    @endforeach
                                </select>
                                @else
                                <p for="motor_id" style="margin-bottom: -0.5px;" class="font-weight-bold">Motor</p>
                                <p for="motor_id" style="margin-bottom: -0.5px;" class="text-danger"><a href="{{ route('motor') }}" class="text-danger">Mohon untuk mengisi data motor</a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-around mt-3">
                            <div class="col-md-6">
                                <p for="kilometer" style="margin-bottom: -0.5px;" class="font-weight-bold">Kilometer</p>
                                <input type="number" class="form-control @error('kilometer') is-invalid @enderror" id="kilometer" name="kilometer" placeholder="Masukkan km motor . . ." value="{{ old('kilometer') }}" autofocus>

                                @error('kilometer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <p for="sparepart1" style="margin-bottom: -0.5px;" class="font-weight-bold">Sparepart</p>
                                <select class="form-control @error('sparepart1') is-invalid @enderror mb-2" id="sparepart1" name="sparepart1">
                                    <option value="">--Pilih--</option>
                                    @foreach ($sparepart as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 sp">
                                <p for="sparepart2" style="margin-bottom: -0.5px;" class="font-weight-bold">Sparepart 2</p>
                                <select class="form-control @error('sparepart2') is-invalid @enderror mb-2" id="sparepart2" name="sparepart2">
                                    <option value="">--Pilih--</option>
                                    @foreach ($sparepart as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 null" id="null">
                            </div>
                            <div class="col-md-6 sp">
                                <p for="sparepart3" style="margin-bottom: -0.5px;" class="font-weight-bold">Sparepart 3</p>
                                <select class="form-control @error('sparepart3') is-invalid @enderror mb-2" id="sparepart3" name="sparepart3">
                                    <option value="">--Pilih--</option>
                                    @foreach ($sparepart as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->sparepart }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <p for="keluhan" style="margin-bottom: -0.5px;" class="font-weight-bold">Keterangan</p>
                                <textarea cols="15" rows="10" class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" placeholder="Ganti Oli (Top One), kampas rem, dll . . ."></textarea>
                                @error('keluhan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                @if ($cekService > 0)
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#process"><b>Service</b></button>

                                <!-- Modal Konfirmasi Reservasi -->
                                <div class="modal fade" id="process" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Gagal Reservasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Anda masih memiliki proses reservasi yang <b>belum selesai</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($motor->count() > 0 && $cekService == 0)
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#reservasi"><b>Service</b></button>

                                <!-- Modal Sedang Dalam Process -->
                                <div class="modal fade" id="reservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Reservasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin melakukan <b>Reservasi</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"><b>Service</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#lengkapi"><b>Service</b></button>

                                <!-- Modal Lengkapi Profile & Motor -->
                                <div class="modal fade" id="lengkapi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Gagal Pemesanan Service</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Mohon untuk melengkapi <b>Data Motor</b> terlebih dahulu
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #78221c"><b>{{ __('Antrian saat ini') }}</b></div>
                <div class="card-body">
                    <h1 class="text-center font-weight-bold">{{ $cekAntrian }}</h1>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-white text-center" style="background-color: #78221c"><b>{{ __('Sparepart Tersedia') }}</b></div>
                <div class="card-body" style="overflow-y: auto; max-height: 356px;">
                    @if ($cekSparepart > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sparepart</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($sparepart as $s)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $s->sparepart }}</td>
                                <td>Tersedia</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center" style="height: 100px; margin-top: 100px;">Sparepart Kosong</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var spareparts = document.getElementsByClassName('sp');
    var sparepart1 = document.getElementById('sparepart1');
    var sparepart2 = document.getElementById('sparepart2');
    
    var zero = document.getElementById('null');

    zero.classList.add('hide');

    for (var i = 0; i < spareparts.length; i++) {
        spareparts[i].classList.add('hide');
    }

    sparepart1.addEventListener("change", function() {
        spareparts[0].classList.remove('hide');
        zero.classList.remove('hide');
    });

    sparepart2.addEventListener("change", function() {
        spareparts[1].classList.remove('hide');
        zero.classList.add('hide');
    });
</script>
@endsection