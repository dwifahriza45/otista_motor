@extends('layouts.login.app')

@section('title', 'Halaman Login Pelanggan')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ URL::asset('img/landing/otista.jpg')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-motorcycle mr-2 fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Otista Motor</span>
                                    </div>
                    
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login Pelanggan</h5>

                                    @if (session('fail'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" placeholder="example@email.com" value="{{ old('email') }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                    
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" style="background-color: #78221c" type="submit">Login</button>
                                    </div>
                    
                                    <p class="mb-5 pb-lg-2">Belum punya akun? <a href="{{ route('register') }}" style="color: #78221c;">Register</a></p>
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