@extends('layouts.landing.app')

@section('title', 'Otista Motor || Landing Page')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5 text-light">Solusi service motor, <br>Bersama kami</h1>
    @guest
    <a href="{{ route('register') }}" class="daftar btn btn-danger"><strong>Daftar Sekarang</strong></a>
    @else
    <a href="{{ route('serviceUser') }}" class="btn btn-danger"><strong>Mulai Service</strong></a>
    @endguest
  </div>
</div>
@endsection