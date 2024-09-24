@extends('layouts.client-layouts')

@section('title', 'Dashboard - Aplikasi Uji Kompetensi Kepolisian')
@push('css')
    <link rel="stylesheet" href="{{ asset('login-assets') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/feather/feather.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('login-assets') }}/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('login-assets') }}/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('login-assets') }}/images/favicon.png" />

@endpush


@section('main-content')
    <div class="row row-cols-1  justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div> @endif
        </div>
    </div>
    <div class="row
        row-cols-1 justify-content-center">

    <div class="col-10 mb-4 btn shadow ">
        <a href="{{ route('client-index') }}">
            <div class="card border-primary">
                <div class="card-body text-left">
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="bi bi-box-arrow-in-right" style="font-size: 1rem; display:inline-block;"></i>
                    </button>
                    <h6 class="card-title font-weight-bold"
                        style="font-size: 1rem; display: inline-block; margin-left: 40px;">INFORMASI</h6>
                </div>
            </div>
        </a>
    </div>

    {{-- <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-index') }}">
                <div class="card border-warning  ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-list-stars text-light" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-warning" style=" font-size: 1rem; display: inline-block; margin-left: 40px;">JADWAL UJIAN</h6>
                    </div>
                </div>
            </a>
        </div> --}}

    <div class="col-10 mb-4 btn shadow">
        <a href="{{ route('client-daftar-hasil-ujian') }}">
            <div class="card border-success ">
                <div class="card-body text-left">
                    <button type="button" class="btn btn-success btn-sm">
                        <i class="bi bi-award" style="font-size: 1rem; display:inline-block;"></i>
                    </button>
                    <h6 class="card-title font-weight-bold text-success"
                        style="font-size: 1rem; display: inline-block; margin-left: 40px;">HASIL UJIAN</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-10 mb-4 btn shadow">
        <a href="{{ route('client-pilih-ukom') }}">
            <div class="card border-info ">
                <div class="card-body text-left">
                    <button type="button" class="btn btn-info btn-sm">
                        <i class="bi bi-star-fill" style="font-size: 1rem; display:inline-block;"></i>
                    </button>
                    <h6 class="card-title font-weight-bold text-info"
                        style="font-size: 1rem; display: inline-block; margin-left: 40px;">MULAI UJIAN</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-10 mb-4 btn shadow">
        {{-- <a href="#"> --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="hidden" name="logoutrequest" value="CLIENT">
            <div class="card border-danger ">
                <div class="card-body text-left">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-activity" style="font-size: 1rem; display:inline-block;"></i>
                    </button>
                    <h6 class="card-title font-weight-bold text-danger"
                        style="font-size: 1rem; display: inline-block; margin-left: 40px;">KELUAR</h6>
                </div>
            </div>
        </form>
        {{-- </a> --}}
    </div>

    </div>
@endsection


@push('js')
    <!-- plugins:js -->
    <script src="{{ asset('login-assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('login-assets') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('login-assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('login-assets') }}/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('login-assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('login-assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('login-assets') }}/js/template.js"></script>
    <script src="{{ asset('login-assets') }}/js/settings.js"></script>
    <script src="{{ asset('login-assets') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('login-assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('login-assets') }}/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

    <script>
        let tmp_timer = 0;
        localStorage.setItem('timer', tmp_timer);
        localStorage.removeItem('kolom');
        window.onload = window.localStorage.clear();
        let index_page = 1;
        localStorage.setItem('index_page', index_page);
        let url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + id_ukom + '?page=' + 0;
        localStorage.removeItem('url_redirect');
    </script>
@endpush
