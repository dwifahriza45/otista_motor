@extends('layouts.login.app')

@section('title', 'Halaman Data Motor - Otista Motor')

@section('content')
<!-- Content -->
<div>
    <p class="h3 text-bold text-center mt-3">DATA MOTOR</p>
    <hr class="mb-3" style="width: 400px; background-color: #000; height: 2px" />
</div>

<div class="container">
    <a href="{{ route('getMotor') }}" class="btn text-light mb-3" style="background-color: #78221c;">
        <i class="fa-solid fa-plus"></i> Tambah Data Motor
    </a>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead text-light" style="background-color: #78221c;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Motor</th>
                    <th scope="col">Merk Motor</th>
                    <th scope="col">Tipe Motor</th>
                    <th scope="col">Nomor Kendaraan</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($motor as $m)
                @if ($m->user_id == Auth::user()->id)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $m->nama_motor }}</td>
                    <td>{{ $m->merk }}</td>
                    <td>{{ $m->this_type->tipe }}</td>
                    <td>{{ $m->no_kendaraan }}</td>
                    <td>
                        <a href="{{ route('updateMotor', $m->id) }}" class="btn btn-success" data="tooltip" data-placement="top" title="Ubah"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal" data="tooltip" data-placement="top" title="Hapus" data-target="#delete{{ $m->id }}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Modal hapus -->
                <div class="modal fade" id="delete{{ $m->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapus-motor">Hapus Data Motor {{ $m->nama_motor }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus data motor <b>{{ $m->nama_motor }}</b> tersebut!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('hapusMotor', $m->id) }}" class="btn text-light" style="background-color: #78221c"><i class="fa-solid fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal hapus -->
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- End Content -->
@endsection