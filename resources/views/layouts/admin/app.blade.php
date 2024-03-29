<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7bd248f835.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/tooltips.css') }}" rel="stylesheet">

    <!-- DataTable -->
    <link rel="stylesheet" href="https://silat.bekasikota.go.id/silat_v2/sip/assets/DataTables/media/css/jquery.dataTables.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/')}}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div class="sidebar-brand-text mr-3">Otista Motor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{request()->is('admin/dashboard') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Otista Motor
            </div>

            <!-- Nav Item - Data Sparepart -->
            <li class="nav-item {{request()->is('admin/kategori/sparepart') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('kategoriSparepart') }}">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Kategori Sparepart</span></a>
            </li>

            <!-- Nav Item - Data Sparepart -->
            <li class="nav-item {{request()->is('admin/sparepart') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('sparepart') }}">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Data Sparepart</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Transaksi
            </div>

            <!-- Nav Item - Data Service -->
            <li class="nav-item {{request()->is('admin/service') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('service') }}">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Data Service</span></a>
            </li>

            <!-- Nav Item - Transaksi Selesai -->
            <li class="nav-item {{request()->is('admin/transaksi/selesai') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('CompTransAdmin') }}">
                    <i class="fas fa-book"></i>
                    <span>Transaksi Selesai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Layanan Pelanggan
            </div>

            <!-- Nav Item - Data Service -->
            <li class="nav-item {{request()->is('admin/pelanggan') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('pelanggan') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pelanggan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Data Service -->
            <li class="nav-item {{request()->is('admin/data') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('dataAdmin') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Personal
            </div>

            <!-- Nav Item - Data Service -->
            <li class="nav-item {{request()->is('admin/profile') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('profileAdmin') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Nav Item - Data Service -->
            <li class="nav-item {{request()->is('admin/ubah/password') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('ubahPasswordAdmin') }}">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Ubah Password</span></a>
            </li>

            <!-- Nav Item - Data Service -->
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('/sbadmin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profileAdmin') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('ubahPasswordAdmin') }}">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ date('Y') }} Otista Motor</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin ingin logout</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/sbadmin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/sbadmin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/sbadmin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/sbadmin/js/demo/chart-pie-demo.js') }}"></script>

    <script>
        $(function() {
            $('[data="tooltip"]').tooltip();
        });
        
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://silat.bekasikota.go.id/silat_v2/sip/assets/DataTables/media/js/jquery.dataTables.js"></script>

    @yield('js')
</body>

</html>