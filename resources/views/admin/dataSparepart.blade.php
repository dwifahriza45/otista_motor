@extends('layouts.admin.app')

@section('title', 'Data Sparepart - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sparepart</h1>
    </div>

    <div style="width: 719px;">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('addSparepart') }}" class="btn btn-danger mb-2 mr-2" style="width: 237px;"><i class="fas fa-plus"></i> Tambah Data Sparepart</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('unduhSparepart') }}" class="btn btn-outline-danger mb-2" style="width: 237px;"><i class="fas fa-print"></i> Cetak Data Sparepart</a>
            </div>
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
                    <th scope="col">Sparepart</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @php $i = 1; @endphp
                @foreach ($sparepart as $s)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $s->sparepart }}</td>
                    <td>{{ $s->stok }}</td>
                    <td>{{ $s->this_kategori->kategori }}</td>
                    <td>@currency($s->harga)</td>
                    <td>
                        <a href="{{ route('updateSparepart', $s->id) }}" class="btn btn-success mb-2" data="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger mb-2" data-toggle="modal" data="tooltip" data-placement="top" title="Hapus" data-target="#delete{{ $s->id }}"><i class="fas fa-trash"></i></a>
                        @if ($s->active == 0)
                        <a href="" class="btn btn-success mb-2" data-toggle="modal" data-toggle="modal" data="tooltip" data-placement="top" title="Aktif" data-target="#aktif{{ $s->id }}"><i class="fas fa-check"></i></a>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="aktif{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan Sparepart {{ $s->sparepart }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin mengaktifkan sparepart tersebut
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('AktifSparepart', $s->id) }}" class="btn btn-success">Aktif</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($s->active == 1)
                        <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-toggle="modal" data="tooltip" data-placement="top" title="Nonaktif" data-target="#nonaktif{{ $s->id }}"><i class="fas fa-times"></i></a>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="nonaktif{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nonaktifkan Sparepart {{ $s->sparepart }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menonaktifkan sparepart tersebut
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('NonaktifSparepart', $s->id) }}" class="btn btn-danger">Nonaktif</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Sparepart {{ $s->sparepart }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus sparepart tersebut
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('hapusSparepart', $s->id) }}" class="btn btn-danger">Hapus</a>
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