@extends('layouts.client-layouts')

@section('title', 'Dashboard - Aplikasi Uji Kompetensi Kepolisian')
@push('css')
    <link rel="stylesheet" href="{{ asset('login-assets') }}/css/style.css" />
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/feather/feather.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/mdi/css/materialdesignicons.min.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/ti-icons/css/themify-icons.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/typicons/typicons.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/simple-line-icons/css/simple-line-icons.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/css/vendor.bundle.base.css" /> --}}
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="{{ asset('login-assets') }}/js/select.dataTables.min.css" /> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('login-assets') }}/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('login-assets') }}/images/favicon.png" />
    <style>
        /* Custom radio button to look like a square checkbox */
        .form-check-input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 28px;
            height: 15px;
            border: 2px solid #555;
            border-radius: 0; /* Remove border radius to make it square */
            display: inline-block;
            position: relative;
        }
    
        .form-check-input[type="radio"]:checked {
            background-color: #0c0c0c;
        }
    
        .form-check-input[type="radio"]::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            background-color: transparent;
        }
    
        .form-check-input[type="radio"]:checked::before {
            background-color: white;
        }
    </style>
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
    <div class="row mt-1 justify-content-center">

        <div class="col-10 mb-1">
            <div class="card border-primary">
                <div class="card-body text-left">

                    <div class="container">

                        <div class="row mx-auto mb-1 text-white mx-auto d-flex justify-content-center">
                            <button class="btn btn-lg btn-danger py-auto pb-0 text-center text-bold">
                                <h5 class="text-white py-auto pb-0">
                                    <b>
                                        <span id="timer"></span>
                                    </b>
                                </h5>
                            </button>
                            <br />
                        </div>

                        <div class="row">
                            <h5 class="text-dark">
                                <b>
                                    <span id="kolom"></span>
                                </b>
                            </h5>
                            <br />
                        </div>
                        <div class="row">
                            <p style="font-size:65%;" class="text-dark">
                                <b>
                                    <span id="nomorsoal"></span>
                                </b>
                            </p>
                            <br />
                        </div>

                        <div class="row">
                            <h5 class="text-dark">
                                Petunjuk soal :
                            </h5>
                            <br />
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                <table class="border">
                                    <thead>
                                        <tr>
                                            @foreach ($soal1 as $item11)

                                                @php
                                                    $split_ori_soal = mb_str_split($item11->soal_kecermatan_original_isi);
                                                @endphp

                                                @foreach ($split_ori_soal as $item111)
                                                <th scope="col" class="border border-dark px-2">
                                                    <h2>
                                                        {{ $item111 }}
                                                    </h2>
                                                </th> @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="row">
    <h5 class="text-dark">
        Soal :
    </h5>
    <br />
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @foreach ($soal as $item)
                @php
                    $soal_isi = mb_str_split($item->soal_isi);
                @endphp
                <div class="container">
                    <div class="row mb-1">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <table class="border">
                                <thead>
                                    <tr>
                                        @foreach ($soal_isi as $item2)
                                            <th scope="col" class="border border-dark px-2">
                                                <h2>
                                                    {{ $item2 }}
                                                </h2>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <form action="{{ route('client-proses-ujian-kecermatan') }}" enctype="multipart/form-data" method="POST"
                    onsubmit="return false;">
                    @csrf
                    <div class="row mb-1 mt-1">
                        {{-- <div class="col-sm-12 col-md-12 col-lg-12"> --}}
                        <input type="hidden" name="soalcount" value={{ $index_count++ }} class="countsoal">
                        <div class="form-group d-flex justify-content-center">
                            <!-- Add d-flex and justify-content-center -->
                            <div class="form-check d-inline-block mt-4">
                                <!-- d-inline-block and margin for spacing -->

                                <div class="form-check d-inline-block mx-1">
                                    <input class="form-check-input inputsoal" type="radio"
                                        name="requestsoal{{ $item->id }}" id="idsoal{{ $item->id }}a"
                                        value="{{ $item->soal_opsi_a }}:{{ $item->id }}">
                                    <label class="form-check-label" for="idsoal{{ $item->id }}a">
                                        {{ htmlspecialchars($item->soal_opsi_a) }}
                                    </label>
                                </div>
                                <div class="form-check d-inline-block mx-1">
                                    <input class="form-check-input inputsoal" type="radio"
                                        name="requestsoal{{ $item->id }}" id="idsoal{{ $item->id }}b"
                                        value="{{ $item->soal_opsi_b }}:{{ $item->id }}">
                                    <label class="form-check-label" for="idsoal{{ $item->id }}b">
                                        {{ htmlspecialchars($item->soal_opsi_b) }}
                                    </label>
                                </div>
                                <div class="form-check d-inline-block mx-1">
                                    <input class="form-check-input inputsoal" type="radio"
                                        name="requestsoal{{ $item->id }}" id="idsoal{{ $item->id }}c"
                                        value="{{ $item->soal_opsi_c }}:{{ $item->id }}">
                                    <label class="form-check-label" for="idsoal{{ $item->id }}c">
                                        {{ htmlspecialchars($item->soal_opsi_c) }}
                                    </label>
                                </div>
                                <div class="form-check d-inline-block mx-1">
                                    <input class="form-check-input inputsoal" type="radio"
                                        name="requestsoal{{ $item->id }}" id="idsoal{{ $item->id }}d"
                                        value="{{ $item->soal_opsi_d }}:{{ $item->id }}">
                                    <label class="form-check-label" for="idsoal{{ $item->id }}d">
                                        {{ htmlspecialchars($item->soal_opsi_d) }}
                                    </label>
                                </div>
                                <div class="form-check d-inline-block mx-1">
                                    <input class="form-check-input inputsoal" type="radio"
                                        name="requestsoal{{ $item->id }}" id="idsoal{{ $item->id }}d"
                                        value="{{ $item->soal_opsi_e }}:{{ $item->id }}">
                                    <label class="form-check-label" for="idsoal{{ $item->id }}d">
                                        {{ htmlspecialchars($item->soal_opsi_e) }}
                                    </label>
                                </div>

                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    </div>

    </div>
    </div>
    </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('login-assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('login-assets') }}/js/dashboard.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var token = $('input[name="_token"]').val();
            let array_jawaban = [];

            let count_soal = {{ $soal_count }};
            let id_ukom = {{ $id_ukom }};

            $('.inputsoal').on('click', function() {
                let cek_val = $(this).val();
                array_jawaban.push(cek_val);

                index_page = parseInt(getIndexPage());

                // console.log(array_jawaban);
                // console.log(count_soal);
                console.log(index_page);

                if (index_page == count_soal) {
                    console.log("SOAL BERHASIL");
                    users_val = {{ $users->id }};
                    url_proses =
                        '{{ route('client-proses-hasil-ujian-kecermatan', [$users->id, $id_ukom]) }}';
                    window.location.href = url_proses;

                }

                if (index_page < count_soal) {
                    index_page = parseInt(tambahIndexPage(index_page));
                    url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + id_ukom + '?page=' +
                        index_page;
                    localStorage.setItem('url_redirect', url_redirect);
                    // console.log(index_page);
                    // console.log(url_redirect);
                    // window.location.href = url_redirect;
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('client-proses-ujian-kecermatan') }}',
                        data: {
                            '_token': token,
                            'urlredirect': url_redirect,
                            'arrayjawaban': array_jawaban,
                            'cekval': cek_val,
                            'indexpage': index_page,
                        },
                        success: function(data) {
                            getIndexPage(parseInt(data.index_page));
                            window.location.href = data.cek_url;
                            console.log(data.cek_url + data.index_page);
                            console.log(data.array_jawaban);
                            console.log(data.index_page);
                            console.log(data.cek_val);
                            console.log("SUKSES");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function runOnceOnPageLoad(cekkkk) {
            var hasRun = localStorage.getItem('hasRun');
            if (!hasRun) {
                cekkkk();
                localStorage.setItem('hasRun', true);
            }
        }

        function startIndexPage(value) {
            var index_page = parseInt(value);
            localStorage.setItem('index_page', index_page);
            return index_page;
        }

        function tambahIndexPage(added) {
            var index_page = added + 1;
            localStorage.setItem('index_page', index_page);
            return index_page;
        }

        function getIndexPage() {
            var index_page = localStorage.getItem('index_page');
            return index_page;
        }

        function getKolom() {
            var kolom = localStorage.getItem('kolom');
            let indexcek = getIndexPage();
            if (indexcek <= 60) {
                localStorage.setItem('kolom', 1);
                kolom = 1;
            }
            if (indexcek >= 61 && indexcek <= 120) {
                localStorage.setItem('kolom', 2);
                kolom = 2;
            }
            if (indexcek >= 121 && indexcek <= 180) {
                localStorage.setItem('kolom', 3);
                kolom = 3;
            }
            if (indexcek >= 181 && indexcek <= 240) {
                localStorage.setItem('kolom', 4);
                kolom = 4;
            }
            if (indexcek >= 241 && indexcek <= 300) {
                localStorage.setItem('kolom', 5);
                kolom = 5;
            }
            if (indexcek >= 301 && indexcek <= 360) {
                localStorage.setItem('kolom', 6);
                kolom = 6;
            }
            if (indexcek >= 361 && indexcek <= 420) {
                localStorage.setItem('kolom', 7);
                kolom = 7;
            }
            if (indexcek >= 421 && indexcek <= 480) {
                localStorage.setItem('kolom', 8);
                kolom = 8;
            }
            if (indexcek >= 481 && indexcek <= 540) {
                localStorage.setItem('kolom', 9);
                kolom = 9;
            }
            if (indexcek >= 541 && indexcek <= 600) {
                localStorage.setItem('kolom', 10);
                kolom = 10;
            }
            return kolom;
        }

        // let n1 = 1;
        // let n2 = 1;
        // let n3 = 1;
        // let n4 = 1;
        // let n5 = 1;
        // let n6 = 1;
        // let n7 = 1;
        // let n8 = 1;
        // let n9 = 1;
        // let n10 = 1;

        // function getNomor() {
        //     var kolom = localStorage.getItem('kolom');
        //     let indexcek = this.getIndexPage();
        //     if (indexcek <= 60) {
        //         localStorage.setItem('kolom', 1);
        //         n1 = 1;
        //     }
        //     if (indexcek >= 61 && indexcek <= 120) {
        //         localStorage.setItem('kolom', 2);
        //         n2 = 1++;
        //     }
        //     if (indexcek >= 121 && indexcek <= 180) {
        //         localStorage.setItem('kolom', 3);
        //         n3 = 1++;
        //     }
        //     if (indexcek >= 181 && indexcek <= 240) {
        //         localStorage.setItem('kolom', 4);
        //         n4 = 1++;
        //     }
        //     if (indexcek >= 241 && indexcek <= 300) {
        //         localStorage.setItem('kolom', 5);
        //         n5 = 1++;
        //     }
        //     if (indexcek >= 301 && indexcek <= 360) {
        //         localStorage.setItem('kolom', 6);
        //         n6 = 1++;
        //     }
        //     if (indexcek >= 361 && indexcek <= 420) {
        //         localStorage.setItem('kolom', 7);
        //         n7 = 1++;
        //     }
        //     if (indexcek >= 421 && indexcek <= 480) {
        //         localStorage.setItem('kolom', 8);
        //         n8 = 1++;
        //     }
        //     if (indexcek >= 481 && indexcek <= 540) {
        //         localStorage.setItem('kolom', 9);
        //         n9 = 1++;
        //     }
        //     if (indexcek >= 541 && indexcek <= 600) {
        //         localStorage.setItem('kolom', 10);
        //         n10 = 1++;
        //     }
        //     return kolom;
        // }

        // Menampilkan kolom yang sedang dikerjakan
        function diplayKolom(statuskolom) {
            var kolomcek = document.getElementById('kolom');
            console.log(kolomcek);
            kolomcek.textContent = "Kolom " + statuskolom;
        }

        // function diplayNomor(statusNomor) {
        //     var nomorcek = document.getElementById('nomorsoal');
        //     console.log(nomorcek);
        //     nomorcek.textContent = statusNomor;
        // }

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
                    // console.log(index_page);

                    cek_index_page = getIndexPage();

                    console.log(cek_index_page);

                    if (cek_index_page <= 60) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 61;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 61);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 60 && cek_index_page <= 120) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 120;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 120);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 120 && cek_index_page <= 180) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 180;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 180);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 180 && cek_index_page <= 240) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 240;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 240);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 240 && cek_index_page <= 300) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 300;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 300);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 300 && cek_index_page <= 360) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 360;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 360);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 360 && cek_index_page <= 420) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 420;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 420);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 420 && cek_index_page <= 480) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 480;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 480);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 480 && cek_index_page <= 540) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 540;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 540);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 541 && cek_index_page <= 600) {
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + 541;
                        console.log(url_redirect);
                        localStorage.setItem('url_redirect', url_redirect);
                        localStorage.setItem('index_page', 540);

                        window.location.href = url_redirect;
                    }

                    if (cek_index_page >= 541 && cek_index_page <= 600) {
                        localStorage.setItem('index_page', 600);
                        indexpagee = getIndexPage();
                        url_redirect = '{{ url('') }}/client/ujian-kecermatan/' + {{ $id_ukom }} +
                            '?page=' + indexpagee;
                        console.log(url_redirect);
                        // Fungsi proses Ujian yang telah Selesai
                        users_val = {{ $users->id }};
                        url_proses = '{{ route('client-proses-hasil-ujian-kecermatan', [$id_ukom, $users->id]) }}';

                        window.location.href = url_proses;
                    }

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
            var hours = Math.floor(timer / 3600);
            var minutes = Math.floor((timer % 3600) / 60);
            var seconds = timer % 60;

            // Format menjadi 2 digit untuk jam, menit, dan detik
            var formattedTime =
                (hours < 10 ? "0" : "") + hours + ":" +
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds;

            var timerElement = document.getElementById('timer');
            timerElement.textContent = formattedTime;
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
            diplayKolom(getKolom());
            // diplayNomor(getNomor());
        });

        cek_idx = getIndexPage();

        console.log(cek_idx);

        if (cek_idx <= 60) {
            localStorage.setItem('kolom', 1);
        }
    </script>
@endpush
