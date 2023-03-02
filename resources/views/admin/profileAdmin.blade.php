@extends('layouts.admin.app')

@section('title', 'Profile - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile {{ auth()->user()->name }}</h1>
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

                    <div class="card-body">
                        <form method="POST" action="{{ route('profileAdmin') }}">
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

                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="name" autofocus placeholder="Masukkan nama . . ." @if (!is_null($user->name)) ? value="{{ $user->name }}" @else value="{{ old('name') }}" @endif>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" placeholder="example@email.com" disabled>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn text-light btn-block" style="background-color: #78221c">
                                    {{ __('Ubah') }}
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