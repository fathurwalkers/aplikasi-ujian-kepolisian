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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
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
                </div>
            @endif
        </div>
    </div>
    <div class="row row-cols-1  justify-content-center">

        @foreach ($ukom as $item)
            <div class="col-10 mb-4 btn shadow ">
                <div class="card border-primary">
                    <div class="card-body text-left">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <span style="color:black;">
                                    Nama Ujian : {{ $item->ukom_nama }} <br />
                                    Kategori Ujian : {{ $item->ukom_kategori }} <br />
                                </span>
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 btn-group d-flex justify-content-center">
                                <button type="button" class="btn btn-success btn-md float-left mx-3"
                                    onclick="location.href = '{{ route('client-konfirmasi-token-ujian', $item->id) }}';">
                                    <b> PILIH UJIAN </b>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> @endforeach

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

@endpush
