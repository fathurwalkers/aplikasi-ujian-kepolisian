@extends('layouts.dashboard-layouts')
@section('title', 'Ujian Kepolisian')
@section('content-prefix', 'Profile')
@section('content-header', 'Dashboard - Profile')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <form action="{{ route('edit-profile') }}" enctype="multipart/form-data" method="POST">
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
                                    <input type="text" class="form-control" id="login_nama"
                                        value="{{ $login->login_nama }}" name="login_nama" required accept-charset="UTF-8">
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
                                        value="{{ $login->login_email }}" name="login_email" required
                                        accept-charset="UTF-8">
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
                                    <span id="message"></span>
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
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
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
                    $('#message').html('Password Cocok!').css('color', 'green');
                    $('#ubah_akun').prop("disabled", false)
                } else {
                    $('#message').html('Password tidak cocok!').css('color', 'red');
                    $('#ubah_akun').prop("disabled", true)
                }
            });
        });
    </script>
@endpush
