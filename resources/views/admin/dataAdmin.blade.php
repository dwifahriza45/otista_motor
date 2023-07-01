@extends('layouts.admin.app')

@section('title', 'Data Admin - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
    </div>

    <div style="width: 719px;">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('tambahAdmin') }}" class="btn btn-danger mb-2 mr-2" style="width: 237px;"><i class="fas fa-plus"></i> Tambah Admin Baru</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('unduhDataAdmin') }}" class="btn btn-outline-danger mb-2" style="width: 237px;"><i class="fas fa-print"></i> Cetak Data Admin</a>
            </div>
            <!-- <div class="col-md-4">
                <div class="input-group" style="width: 237px;">
                    <input id="myInput" class="form-control" type="search" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-2 display" cellspacing="0" width="100%">
            <thead class="bg-danger text-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <input type="hidden" value="{{ $count = 1 }}">
                @foreach ($admin as $adm)
                <tr>
                    <th scope="row">{{ $count++ }}</th>
                    <td>{{ $adm->name }}</td>
                    <td>{{ $adm->email }}</td>
                    <td>{{ $adm->no_hp }}</td>
                    <td>
                        @if ($adm->id == $user->id)
                        <a href="{{ route('profileAdmin') }}" class="btn btn-success mb-2"><i class="fas fa-edit"></i></a>
                        @else
                        <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-toggle="modal" data-target="#admin{{ $adm->id }}"><i class="fas fa-trash"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id="admin{{ $adm->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Admin {{ $adm->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus admin tersebut
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('hapusAdmin', $adm->id) }}" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->
@endsection