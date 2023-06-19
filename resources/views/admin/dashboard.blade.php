@extends('layouts.admin.app')

@section('title', 'Dashboard - Otista Motor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Reservasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Reservasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReservasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Antrian Motor -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Motor Dalam Antrian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countQueu }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-undo-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Motor Diperbaiki -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Motor Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countRepair }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Motor Selesai Diperbaiki -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Motor Selesai Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countRepairDone }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Count Admin -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('dataAdmin') }}">{{ $countAdmin }}</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Count Pelanggan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('pelanggan') }}">{{ $countPelanggan }}</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Reservasi Berjalan</h6>
                </div>
                <div class="card-body">
                    <p>Jumlah Reservasi Berjalan: <b>{{ $countService }}</b></p>
                    <table class="table">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        @php $i = 1; @endphp
                        @foreach ($service as $s)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $s->this_user->name }}</td>
                                <td>
                                    @if ($s->queue != null && $s->repair == null)
                                    <a href="{{ route('service') }}" class="text-dark">Motor sedang dalam antrian</a>
                                    @endif

                                    @if ($s->approve_admin != null && $s->confirm_user == null)
                                    <a href="{{ route('service') }}" class="text-dark">Menunggu Konfirmasi Penyerahan Motor Pelanggan</a>
                                    @endif

                                    @if ($s->approve_admin == null && $s->reject_admin == null)
                                    <a href="{{ route('service') }}" class="text-dark">Menunggu Konfirmasi Anda</a>
                                    @endif

                                    @if ($s->confirm_user != null && $s->queue == null)
                                    <a href="{{ route('service') }}" class="text-dark">Motor sudah diserahkan</a>
                                    @endif

                                    @if ($s->repair != null && $s->repair_done == null)
                                    <a href="{{ route('service') }}" class="text-dark">Motor sedang diperbaiki</a>
                                    @endif

                                    @if ($s->repair_done != null && $s->done == null)
                                    <a href="{{ route('service') }}" class="text-dark">Motor selesai diperbaiki</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Informasi Reservasi</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Reservasi Ditolak <span class="float-right">{{ $reservasiTolak }}</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar"
                        @if ($reservasiTolak < 5)
                        style="width: 10%"
                        @elseif ($reservasiTolak > 5)
                        style="width: 20%"
                        @elseif ($reservasiTolak > 10)
                        style="width: 50%"
                        @elseif ($reservasiTolak > 15)
                        style="width: 99%"
                        @endif
                        aria-valuenow="{{ $reservasiTolak }}" aria-valuemin="0" aria-valuemax="{{ $totalReservasi }}"></div>
                    </div>
                    <h4 class="small font-weight-bold">Reservasi Dibatalkan Pelanggan <span class="float-right">{{ $reservasiBatal }}</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar"
                        @if ($reservasiBatal < 5)
                        style="width: 10%"
                        @elseif ($reservasiBatal > 5)
                        style="width: 20%"
                        @elseif ($reservasiBatal > 10)
                        style="width: 50%"
                        @elseif ($reservasiBatal > 15)
                        style="width: 99%"
                        @endif
                        aria-valuenow="{{ $reservasiBatal }}" aria-valuemin="0" aria-valuemax="{{ $totalReservasi }}"></div>
                    </div>
                    <h4 class="small font-weight-bold">Reservasi Selesai <span class="float-right">{{ $reservasiSelesai }}</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar"
                        @if ($reservasiSelesai < 5)
                        style="width: 10%"
                        @elseif ($reservasiSelesai > 5)
                        style="width: 20%"
                        @elseif ($reservasiSelesai > 10)
                        style="width: 50%"
                        @elseif ($reservasiSelesai > 15)
                        style="width: 99%"
                        @endif
                        aria-valuenow="{{ $reservasiSelesai }}" aria-valuemin="0" aria-valuemax="{{ $totalReservasi }}"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection