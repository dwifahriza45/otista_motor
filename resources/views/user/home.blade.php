@extends('layouts.login.app')

@section('title', 'Halaman Home - Otista Motor')

@section('content')
<!-- Content -->
<div>
    <p class="h3 text-bold text-center mt-3">DAFTAR STOK & HARGA SPAREPART MOTOR</p>
    <hr class="mb-5" style="width: 400px; background-color: #000; height: 2px" />
</div>

<div class="container">
    <table class="table">
        <thead class="thead text-light" style="background-color: #78221c;">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Sparepart</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Lorem</td>
                <td>20</td>
                <td>Rp. 100.000</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End Content -->
@endsection
