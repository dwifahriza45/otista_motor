@extends('layouts.login.app')

@section('title', 'Halaman Profile - Otista Motor')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #78221c">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profileUser') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8 mb-3">
                                <a href="#" data-toggle="modal" data-target="#image{{ $user->id }}">
                                    <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle" width="150px" height="140" alt="{{ $user->name }}">
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="image{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <button class="btn btn-danger mb-3" data-dismiss="modal">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                                <div class="modal-content">
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" width='500'>
                                    <div class="form-group row mt-2">
                                        <label for="image" class="col-md-3 col-form-label text-md-right"></label>
                                        <div class="col-md-7">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus placeholder="Ucup" @if (!is_null($user->name)) ? value="{{ $user->name }}" @else value="{{ old('name') }}" @endif >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" placeholder="example@email.com" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap . . ." rows="3">{{ !is_null($user->alamat) ? $user->alamat : old('alamat') }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('No Hp') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="0812-3456-789" @if (!is_null($user->no_hp)) ? value="{{ $user->no_hp }}" @else value="{{ old('no_hp') }}" @endif >


                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-light btn-block" style="background-color: #78221c">
                                    {{ __('Ubah') }}
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