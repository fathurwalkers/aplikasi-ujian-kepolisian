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
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .nilai {
            font-size: 120px!important;
            color: rgb(68, 255, 68)!important;
            text-shadow: #000!important;
            margin-top: 0!important;
        }

        .nilaiskor {
            font-size: 20px!important;
            color: rgb(0, 0, 0)!important;
            text-shadow: #000!important;
        }

        .cell {
            vertical-align:top!important;
        }

    </style>
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
        mt-2">
    <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center">

        <div class="card">
            <div class="card-header text-center">
                <b> HASIL UJIAN </b>
            </div>

            <div class="card-body">

                <div class="row mx-auto d-flex justify-content-center mb-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                        <img src="{{ asset('assets') }}/logo-trc.jpeg" alt="" width="200px">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-12 col-md-12 col-lg-12">

                        <table>
                            <tr class="align-top">
                                <td style="width: 50%">Nama </td>
                                <td style="width: 5%">: </td>
                                <td style="width: 45%">{{ $data->data_nama }}</td>
                            </tr>
                            <tr class="align-top">
                                <td style="width: 50%">UKOM </td>
                                <td style="width: 5%">: </td>
                                <td style="width: 45%">{{ $ukom->ukom_nama }}</td>
                            </tr>
                            <tr class="align-top">
                                <td style="width: 50%">Kategori Ujian </td>
                                <td style="width: 5%">: </td>
                                <td style="width: 45%">{{ strtoupper($ukom->ukom_kategori) }}</td>
                            </tr>
                            <tr class="align-top">
                                <td style="width: 50%">Jumlah Soal </td>
                                <td style="width: 5%">: </td>
                                <td style="width: 45%"><b>{{ $soal_count }} </b></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="example1" class="display table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Salah</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ $hasil->hasil_benar }}</td>
                                        <td>{{ $hasil->hasil_salah }}</td>
                                        <td>{{ $hasil->hasil_total_nilai }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="display table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No. </th>
                                        @if ($ukom->ukom_kategori == 'kecermatan')
                                        <th>Soal</th>
                                        @endif
                                        <th>Isi Soal</th>
                                        <th>Jawaban Peserta</th>
                                        <th>Jawaban Soal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $iter = 1;
                                    @endphp
                                    @for ($i = 0; $i < $soal_count; $i++)
                                    <tr>
                                        <td>
                                            {{ $iter++ }}
                                        </td>

                                        @if ($ukom->ukom_kategori == 'kecermatan')
                                        <td>{{ $array_hasil_soal['original_soal'][$i] }}</td>
                                        @endif

                                        <td>{!! $array_hasil_soal['isi_soal'][$i] !!}</td>
                                        <td>
                                            @if ($array_hasil_soal['jawaban_user'][$i] !== null)
                                                {{ $array_hasil_soal['jawaban_user'][$i] }}
                                            @else
                                                <span style="color:red;">
                                                    TIDAK DIJAWAB
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($array_hasil_soal['jawaban_soal'][$i] !== null)
                                                {{ $array_hasil_soal['jawaban_soal'][$i] }}
                                            @else
                                                <span style="color:red;">
                                                    TIDAK DIJAWAB
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @switch($array_hasil_soal['pencocokan'][$i])
                                                @case(true)
                                                    <span style="color:rgb(83, 238, 83);">
                                                        BENAR
                                                    </span>
                                                    @break
                                                @case(false)
                                                    <span style="color:red;">
                                                        SALAH
                                                    </span>
                                                    @break
                                            @endswitch
                                        </td>
                                    </tr> @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12
        col-md-12 col-lg-12 d-flex justify-content-center mt-4">
    <button type="button" class="btn btn-info shadow"
        onclick="location.href = '{{ route('client-index') }}';">SELESAI</button>
    </div>
    </div>

    </div>
    </div>

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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [],
            });
        });
    </script>
@endpush
