@extends('layouts.admin.app')

@section('title', 'Data Admin - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
    </div>

    <a href="{{ route('tambahAdmin') }}" class="btn btn-danger mb-2 mr-2"><i class="fas fa-plus"></i> Tambah Admin Baru</a>
    <a href="" class="btn btn-outline-danger mb-2"><i class="fas fa-print"></i> Cetak Data Admin</a>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table mt-2">
        <thead class="bg-danger text-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Admin</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" value="{{ $count = 1 }}">
            @foreach ($admin as $adm)
            <tr>
                <th scope="row">{{ $count++ }}</th>
                <td>
                    <a href="" data-toggle="modal" data-target="#image{{ $user->id }}">Klik</a>
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
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </td>
                <td>{{ $adm->name }}</td>
                <td>{{ $adm->email }}</td>
                <td>
                    @if ($adm->id == $user->id)
                    <a href="{{ route('profileAdmin') }}" class="btn btn-success mb-2"><i class="fas fa-edit"></i>Ubah</a>
                    @else
                    <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-toggle="modal" data-target="#admin{{ $adm->id }}"><i class="fas fa-trash"></i> Hapus</a>

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
<!-- /.container-fluid -->
@endsection