@extends('layouts.admin.app')

@section('title', 'Kategori Sparepart - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Sparepart</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('addKategoriSparepart') }}" class="btn btn-danger mb-2 mr-2"><i class="fas fa-plus"></i> Tambah Kategori Sparepart</a>
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
        <table class="table table-bordered table-hover mt-2 display">
            <thead class="bg-danger text-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategor Sparepart</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @php $i = 1; @endphp
                @foreach ($kategori as $k)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $k->kategori }}</td>
                    <td>
                        <a href="{{ route('updateKategoriSparepart', $k->id) }}" class="btn btn-success mb-2" data="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger mb-2" data-toggle="modal" data="tooltip" data-placement="top" title="Hapus" data-target="#delete{{ $k->id }}"><i class="fas fa-trash"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Sparepart {{ $k->kategori }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus kategori sparepart tersebut
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('hapusKategoriSparepart', $k->id) }}" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
@endsection