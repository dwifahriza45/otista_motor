
@extends('layouts.login.app')

@section('title', 'Halaman Register')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-8">
                <div class="card">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-motorcycle mr-2 fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Otista Motor</span>
                                    </div>
                    
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftar sebagai pelanggan</h5>

                                    @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Nama Lengkap</label>
                                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap . . .">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Nama Lengkap</label>
                                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap . . .">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="example@email.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="no_hp">No HP</label>
                                        <input id="no_hp" type="number" class="form-control form-control-lg @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" placeholder="08XX-XXXX-XXXX">

                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="password">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="*****">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="*****">
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" style="background-color: #78221c" type="submit">Register</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2">Sudah punya akun? <a href="{{ route('login') }}" style="color: #78221c;">Login</a></p>

                                </form>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection