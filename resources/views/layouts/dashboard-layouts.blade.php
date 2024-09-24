<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="utf-8"> --}}
    <meta charset="unknown-8bit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('assets/ruangadmin') }}/img/logo/logo.png" rel="icon">
    <title>@yield('title') - @yield('content-header')</title>
    <link href="{{ asset('assets/ruangadmin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/ruangadmin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/ruangadmin') }}/css/ruang-admin.min.css" rel="stylesheet">
    @stack('css')
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <x-dashboard-navbar />
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <x-dashboard-search-panel />
                        {{-- <x-dashboard-notifikasi />
                        <x-dashboard-pesan />
                        <x-dashboard-task-center /> --}}
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <x-dashboard-user-panel />
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-1">
                        <h1 class="h3 mb-0 text-gray-800">@yield('content-header')</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@yield('content-prefix')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('content-header')</li>
                        </ol>
                    </div>

                    {{-- <div class="card mb-3"> --}}
                    {{-- <div class="card-body"> --}}
                    {{-- <div class="container"> --}}
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('main-content')
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}

                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="logoutrequest" value="ADMIN">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer> --}}
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/js/ruang-admin.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    @stack('js')

</body>

</html>
