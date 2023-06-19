<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7bd248f835.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css')}}">
    <link href="{{ URL::asset('/css/tooltips.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body>
    @guest
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #78221c">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}"><i class="fas fa-motorcycle mr-2"></i> Otista Motor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="btn {{request()->is('login/user') ? ' active' : ''}} text-light dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('login') }}">Pelanggan</a>
                                <a class="dropdown-item" href="{{ route('loginAdmin') }}">Admin</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{request()->is('register') ? ' active' : ''}}" href="{{ route('register') }}">Register <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #78221c">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}"><i class="fas fa-motorcycle mr-2"></i>Otista Motor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('service') ? ' active' : ''}}" href="{{ route('serviceUser') }}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('notifikasi') ? ' active' : ''}}" href="{{ route('notifikasi') }}">Notifikasi</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="btn {{request()->is('login/user') ? ' active' : ''}} text-light dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('profileUser') }}"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="{{ route('CompTrans') }}"><i class="fas fa-wallet mr-2"></i>Transaksi Selesai</a>
                                <a class="dropdown-item" href="{{ route('motor') }}"><i class="fas fa-motorcycle mr-2"></i>Motor</a>
                                <a class="dropdown-item" href="{{ route('ubahPassword') }}"><i class="fas fa-lock mr-2"></i>Ubah Password</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Logout -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin <span class="font-weight-bold">Logout</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ route('logout') }}" class="btn text-light" style="background-color: #78221c">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @endguest

    @yield('content')

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white mt-5" style="background-color: #78221c">
        <!-- Section: Links  -->
        <section class="p-2">
            <div class="container text-center text-md-start pt-3">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Otista Motor</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #FFF; height: 2px" />

                        <p>
                            Jl. Otto Iskandardinata No.80, Nanggeleng, Kec. Citamiang, Kota Sukabumi, Jawa Barat 43143
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Produk</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #FFF; height: 2px" />

                        <p><a href="#!" class="text-white">Service</a></p>
                        <p><a href="#!" class="text-white">Sparepart</a></p>


                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Kontak</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #FFF; height: 2px" />

                        <p><i class="fas fa-home mr-3"></i> Kota Sukabumi, Indonesia</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@otista.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            &copy; {{ date('Y') }} Copyright
            <a class="text-white" href="{{URL::to('/')}}">Otista Motor</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('[data="tooltip"]').tooltip();
        });
    </script>

    @yield('js')
</body>

</html>