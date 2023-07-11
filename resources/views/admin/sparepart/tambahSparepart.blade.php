@extends('layouts.admin.app')

@section('title', 'Tambah Sparepart - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Sparepart</h1>
    </div>

    <div class="mt-4">
        <div class="row justify-content-start">
            <div class="col-md-4">
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

                    <div class="card-body">
                        <form method="POST" action="{{ route('addSparepart') }}">
                            @csrf

                            <div class="form-group">
                                <label for="sparepart">Sparepart</label>
                                <input type="text" class="form-control @error('sparepart') is-invalid @enderror" id="sparepart" name="sparepart" value="{{ old('sparepart') }}" autocomplete="sparepart" autofocus placeholder="Masukkan sparepart . . .">
                                @error('sparepart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="stok">Jumlah Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}" autocomplete="stok" autofocus placeholder="Jumlah stok . . .">
                                @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori_id">{{ __('Kategori Sparepart') }}</label>
                                <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                                    <option value="#">- Pilih -</option>
                                    @foreach ($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" autocomplete="harga" autofocus placeholder="Harga . . .">
                                @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block">
                                    {{ __('Tambah') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection