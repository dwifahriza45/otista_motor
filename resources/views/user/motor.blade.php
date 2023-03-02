@extends('layouts.login.app')

@section('title', 'Halaman Data Motor - Otista Motor')

@section('content')
<!-- Content -->
<div>
    <p class="h3 text-bold text-center mt-3">DATA MOTOR</p>
    <hr class="mb-3" style="width: 400px; background-color: #000; height: 2px" />
</div>


<div class="container">
    <button type="button" class="btn text-light mb-3" style="background-color: #78221c;" data-toggle="modal" data-target="#exampleModal">
        <i class="fa-solid fa-plus"></i> Tambah Data Motor
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Motor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name_motor" class="col-form-label">Nama Motor</label>
                        <input type="text" class="form-control" id="name_motor" name="merk_motor" placeholder="Masukkan nama motor . . .">
                    </div>
                    <div class="form-group">
                        <label for="merk_motor" class="col-form-label">Merk Motor</label>
                        <input type="text" class="form-control" id="merk_motor" name="merk_motor" placeholder="Masukkan merk motor . . .">
                    </div>
                    <div class="form-group">
                        <label for="tipe_motor" class="col-form-label">Tipe Motor</label>
                        <select class="form-control" id="tipe_motor" name="tipe_motor">
                            <option value="#">- Pilih -</option>
                            <option value="#">Matic</option>
                            <option value="#">Manual</option>
                            <option value="#">Kopling</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_kendaraan" class="col-form-label">Nomor Kendaraan</label>
                        <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" placeholder="Masukkan nomor kendaraan . . .">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn text-light" style="background-color: #78221c">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- end modal tambah -->

    <table class="table">
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
            <tr>
                <th scope="row">1</th>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>glorium</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubah-motor"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-motor"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>

            <tr>
                <th scope="row">1</th>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>glorium</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubah-motor"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-motor"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>glorium</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubah-motor"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-motor"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>glorium</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubah-motor"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-motor"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>

            <!-- Modal ubah -->
            <div class="modal fade" id="ubah-motor" tabindex="-1" role="dialog" aria-labelledby="ubah-motor" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ubah-motor">Ubah Data Motor Lorem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name_motor" class="col-form-label">Nama Motor</label>
                                <input type="text" class="form-control" id="name_motor" name="merk_motor" value="Lorem">
                            </div>
                            <div class="form-group">
                                <label for="merk_motor" class="col-form-label">Merk Motor</label>
                                <input type="text" class="form-control" id="merk_motor" name="merk_motor" value="Lorem">
                            </div>
                            <div class="form-group">
                                <label for="tipe_motor" class="col-form-label">Tipe Motor</label>
                                <select class="form-control" id="tipe_motor" name="tipe_motor">
                                    <option value="#">- Pilih -</option>
                                    <option value="#">Matic</option>
                                    <option value="#">Manual</option>
                                    <option value="#">Kopling</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_kendaraan" class="col-form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" value="lorem">
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn text-light" style="background-color: #78221c">Simpan</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <!-- end modal ubah -->

            <!-- Modal hapus -->
            <div class="modal fade" id="hapus-motor" tabindex="-1" role="dialog" aria-labelledby="hapus-motor" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="hapus-motor">Hapus Data Motor Lorem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus data motor lorem tersebut!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn text-light" style="background-color: #78221c"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- end modal hapus -->
        </tbody>
    </table>
</div>
<!-- End Content -->
@endsection