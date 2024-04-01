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
                </div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body border-dark">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <div class="row">
                        <p style="font-size:95%;" class="text-dark">
                            Waktu Tersisa :
                            <b>
                                <span id="timer"></span>
                            </b>
                        </p>
                        <br />
                    </div>

                    <form action="{{ route('client-post-cek-ujian', $ukom->id) }}" method="POST" enctype="multipart/form-data" id="submitform">
                        @csrf
                        {{-- @dd($soal) --}}
                        @foreach ($soal as $item)
                        <div class="row mb-4">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label for="">Soal Nomor {{ $loop->iteration }} <br /> {!! $item->soal_isi !!}</label>
                                <div class="form-check">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <input class="form-check-input" type="radio" name="requestsoal{{ $item->id }}"
                                            id="idsoal{{ $item->id }}a" value="A">
                                            <label class="form-check-label" for="idsoal{{ $item->id }}a">
                                                A. {{ $item->soal_opsi_a }}
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ asset('/foto') }}/{{ $item->soal_opsi_gambar_a }}" alt="" width="85px">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <input class="form-check-input" type="radio" name="requestsoal{{ $item->id }}"
                                            id="idsoal{{ $item->id }}b" value="B">
                                            <label class="form-check-label" for="idsoal{{ $item->id }}b">
                                                B. {{ $item->soal_opsi_b }}
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ asset('/foto') }}/{{ $item->soal_opsi_gambar_b }}" alt="" width="85px">
                                        </div>
                                    </div>
                                </div>
                                @if ($ukom->ukom_kategori !== 'kepribadian' && $ukom->ukom_kategori == 'campur')
                                <div class="form-check">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <input class="form-check-input" type="radio" name="requestsoal{{ $item->id }}"
                                            id="idsoal{{ $item->id }}c" value="C">
                                            <label class="form-check-label" for="idsoal{{ $item->id }}c">
                                                C. {{ $item->soal_opsi_c }}
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ asset('/foto') }}/{{ $item->soal_opsi_gambar_c }}" alt="" width="85px">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <input class="form-check-input" type="radio" name="requestsoal{{ $item->id }}"
                                            id="idsoal{{ $item->id }}d" value="D">
                                            <label class="form-check-label" for="idsoal{{ $item->id }}d">
                                                D. {{ $item->soal_opsi_d }}
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ asset('/foto') }}/{{ $item->soal_opsi_gambar_d }}" alt="" width="85px">
                                        </div>
                                    </div>
                                </div>
                                @if ($item->soal_opsi_e !== null && $ukom->ukom_kategori == 'campur')
                                <div class="form-check">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <input class="form-check-input" type="radio" name="requestsoal{{ $item->id }}"
                                            id="idsoal{{ $item->id }}e" value="E">
                                            <label class="form-check-label" for="idsoal{{ $item->id }}e">
                                                E. {{ $item->soal_opsi_e }}
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ asset('/foto') }}/{{ $item->soal_opsi_gambar_e }}" alt="" width="85px">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div> @endforeach

                        <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <button type="submit" class="btn btn-info" id="buttonselesai">
            SELESAI
        </button>
    </div>
    </div>

    </form>

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
    <script>
        // Mengatur timer dalam local storage session
        function startTimer(duration) {
            var timer = duration;
            localStorage.setItem('timer', timer); // Menyimpan nilai awal timer dalam local storage session

            var interval = setInterval(function() {
                timer--;
                localStorage.setItem('timer', timer); // Mengupdate nilai timer dalam local storage session
                displayTimer(timer);

                if (timer <= 0) {
                    clearInterval(interval);
                    // Timer telah selesai, lakukan tindakan yang diinginkan di sini
                    console.log('Timer telah selesai');
                    users_val = {{ $users->id }};
                    // url_proses = '{{ route('client-proses-hasil-ujian', [$ukom->id, $users->id]) }}';
                    // window.location.href = url_proses;
                    $("#submitform").submit();
                }
            }, 1000);
        }

        // Mendapatkan nilai timer dari local storage session
        function getTimer() {
            var timer = localStorage.getItem('timer');
            return timer ? parseInt(timer) : 0;
        }

        // Menampilkan timer pada halaman HTML
        function displayTimer(timer) {
            var timerElement = document.getElementById('timer');
            timerElement.textContent = timer + ' detik';
        }

        // Memulai timer saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            var duration = {{ $detik }}; // Durasi timer dalam detik
            var remainingTime = getTimer();

            if (remainingTime > 0) {
                startTimer(remainingTime);
            } else {
                startTimer(duration);
            }
            displayTimer(remainingTime);
        });
    </script>

@endpush
