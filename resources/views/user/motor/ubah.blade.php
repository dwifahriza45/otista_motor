@extends('layouts.login.app')

@section('title', 'Ubah Data Motor - Otista Motor')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #78221c">{{ __('Ubah Motor') }}</div>

                <div class="card-body">
                    <form method="POST" action="/motor/ubah/{{ $data->id }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_motor" class="col-md-4 col-form-label text-md-right">{{ __('Nama Motor') }}</label>

                            <div class="col-md-6">
                                <input id="nama_motor" type="text" class="form-control @error('nama_motor') is-invalid @enderror" name="nama_motor" autocomplete="nama_motor" value="{{ $data->nama_motor }}" autofocus placeholder="Masukkan nama motor . . .">

                                @error('nama_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="merk" class="col-md-4 col-form-label text-md-right">{{ __('Merk Motor') }}</label>

                            <div class="col-md-6">
                                <input id="merk" type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" autocomplete="merk" value="{{ $data->merk }}" autofocus placeholder="Masukkan merk motor . . .">

                                @error('merk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipe Motor') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('tipe_id') is-invalid @enderror" id="tipe_id" name="tipe_id">
                                @foreach ($tipe as $t)
                                <option value="{{ $t->id }}" {{ $data->tipe_id == $t->id ? 'selected' : '' }}>
                                    {{ $t->tipe }}
                                </option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_kendaraan" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Polisi') }}</label>

                            <div class="col-md-6">
                                <input id="no_kendaraan" type="text" class="form-control @error('no_kendaraan') is-invalid @enderror" name="no_kendaraan" autocomplete="no_kendaraan" value="{{ $data->no_kendaraan }}" autofocus placeholder="Masukkan nama motor . . .">

                                @error('no_kendaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-light btn-block" style="background-color: #78221c">
                                    {{ __('Ubah Motor') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection