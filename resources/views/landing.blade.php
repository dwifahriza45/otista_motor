@extends('layouts.landing.app')

@section('title', 'Otista Motor || Landing Page')

@section('content')
<div class="wrapper">
  <div class="section section-hero section-shaped">
    <div class="page-header">
      <div class="container shape-container d-flex align-items-center py-lg bg-landing">
        <div class="col px-0">
          <div class="row align-items-center justify-content-end">
            <div class="col-lg-7 text-right">
              <h1 class="text-gray-800 display-1" style="font-size: 3rem;">Solusi Service Motor</h1>
              <h2 class="display-4 font-weight-normal text-gray-400" style="font-size: 2rem;">Bersama Kami</h2>
              <div class="btn-wrapper mt-4">
                @guest
                <a href="{{ route('register') }}" class="btn btn-secondary btn-icon mt-3 mb-sm-0" style="width: 200px; background-color: #78221c;">
                  <span class="btn-inner--text text-white">Register</span>
                </a>
                @else
                <a href="{{ route('serviceUser') }}" class="btn btn-secondary btn-icon mt-3 mb-sm-0" style="width: 200px; background-color: #78221c;">
                  <span class="btn-inner--text text-white">Mulai Service</span>
                </a>
                @endguest
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section>
  <div class="section features-6">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="info info-horizontal info-hover-primary">
            <div class="description pl-4">
              <h5 class="title">Daftarkan akun</h5>
              <p>Pengguna membuka halaman pendaftaran dan memasukkan informasi pribadi seperti nama, email, nomor
                telepon, dan kata sandi. Setelah validasi informasi dan verifikasi email/nomor telepon, akun pengguna
                dibuat dan mereka menerima konfirmasi pendaftaran.</p>
              <a href="#" class="text-danger">Register Account</a>
            </div>
          </div>
          <div class="info info-horizontal info-hover-primary mt-5">
            <div class="description pl-4">
              <h5 class="title">Masukan data motor</h5>
              <p>Pengguna membuka halaman masukan data motor dan memasukkan informasi seperti merek, plat nomor
                kendaraan dan informasi lainnya. Setelah validasi, data motor disimpan dalam database dan pengguna
                menerima konfirmasi. Mereka dapat mengakses dan mengelola informasi motor tersebut di masa mendatang.
              </p>

            </div>
          </div>
          <div class="info info-horizontal info-hover-primary mt-5">
            <div class="description pl-4">
              <h5 class="title">Service</h5>
              <p>Pelanggan mengajukan permintaan service motor melalui telepon, situs web, atau aplikasi. Tim layanan
                mengatur jadwal dan teknisi melakukan pemeriksaan, perbaikan, atau pemeliharaan. Pelanggan membayar
                biaya layanan dan menerima motor yang telah selesai diperbaiki atau dirawat dengan baik.</p>

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-10 mx-md-auto">
          <img class="ml-lg-5" src="{{ URL::asset('img/landing/illustrasi.png')}}" width="100%">
        </div>
      </div>
    </div>
  </div>
</section>
@endsection