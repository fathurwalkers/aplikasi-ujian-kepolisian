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

    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <form action="{{ route('client-edit-profile') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p>
                                Informasi Akun User
                            </p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="login_nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="login_nama" value="{{ $login->login_nama }}"
                                    name="login_nama" required accept-charset="UTF-8">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="login_username">Username</label>
                                <input type="text" class="form-control" id="login_username"
                                    value="{{ $login->login_username }}" name="login_username" required
                                    accept-charset="UTF-8">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="login_email">Email</label>
                                <input type="text" class="form-control" id="login_email"
                                    value="{{ $login->login_email }}" name="login_email" required accept-charset="UTF-8">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="login_telepon">No. HP / Telepon</label>
                                <input type="number" class="form-control" id="login_telepon"
                                    value="{{ $login->login_telepon }}" name="login_telepon" required
                                    accept-charset="UTF-8">
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p>
                                Silahkan Mengisikan Password baru jika ingin mengganti password akun anda
                            </p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="login_password">Password Baru</label>
                                <input type="password" class="form-control" id="login_password" name="login_password"
                                    accept-charset="UTF-8">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="login_password2">Konfirmasi Ulang Password</label>
                                <input type="password" class="form-control" id="login_password2" name="login_password2"
                                    accept-charset="UTF-8">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <b>
                                <span id="messagee"></span>
                            </b>
                        </div>
                    </div>

                    <hr />

                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <button id="ubah_akun" type="submit" class="btn btn-info float-right">Ubah Akun</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>

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
    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/js/ruang-admin.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <!-- End custom js for this page-->

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#login_username').on('keypress', function(event) {
                var regex = new RegExp("^[a-z0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });

            $('#login_password, #login_password2').on('keyup', function() {
                if ($('#login_password').val() == $('#login_password2').val()) {
                    $('#messagee').html('Password Cocok!').css('color', 'green');
                    $('#ubah_akun').prop("disabled", false)
                } else {
                    $('#messagee').html('Password tidak cocok!').css('color', 'red');
                    $('#ubah_akun').prop("disabled", true)
                }
            });
        });
    </script>

    <script>
        let tmp_timer = 0;
        localStorage.setItem('timer', tmp_timer);
        window.onload = window.localStorage.clear();
        let index_page = 1;
        localStorage.setItem('index_page', index_page);
        let url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + id_ukom + '?page=' + 0;
        localStorage.setItem('url_redirect', url_redirect);
    </script>

@endpush
