@extends('wheeldecide.wheel-layout')

@section('title', 'Halaman Index')

@push('css')
    <style>
        /* CSS untuk teks dengan stroke */
        .text-stroke {
            /* Ukuran font */
            font-weight: bold;
            color: rgb(255, 217, 0);
            /* Warna isi teks */
            -webkit-text-stroke: 1px #fff;
            /* Warna dan ketebalan stroke */
            text-shadow:
                1px 1px 0px #fff,
                /* Shadow hitam ke kanan bawah */
                -1px 1px 0px #fff,
                /* Shadow hitam ke kiri bawah */
                1px -1px 0px #fff,
                /* Shadow hitam ke kanan atas */
                -1px -1px 0px #fff;
            /* Shadow hitam ke kiri atas */
        }
    </style>

    <style media="screen">
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        section.color {
            min-height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #canvasContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .rf {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .ra {
            width: 30%;
            margin-left: auto;
            margin-right: auto;
        }

        .rm {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #canvasContainer {
            text-align: center;
            position: relative;
            width: 100%;
        }

        #canvas {
            z-index: 1;
            display: inline;
            width: 400px;
        }

        .pc {
            position: inherit;
            margin-bottom: -60px;
            z-index: 999;
        }

        @media only screen and (min-width: 350px) and (max-width: 375px) {
            #canvas {
                z-index: 1;
                display: inline;
                width: 350px;
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 320px) {
            #canvas {
                z-index: 1;
                display: inline;
                width: 320px;
            }
        }

        .rbstyle {
            color: #fed136;
            border: none;
            background-color: inherit;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
        }

        .rbstyle:focus {
            outline: 0;
        }

        .black {
            background-color: rgba(0, 0, 0, 0.7);
        }

        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        .modal1 {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 200ms ease-in-out;
            border: 1px solid black;
            border-radius: 10px;
            z-index: 10;
            background-color: white;
            width: 500px;
            max-width: 80%;
        }

        .modal1.active {
            transform: translate(-50%, -50%) scale(1);
        }

        .modal-header1 {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
        }

        .modal-header1 .title {
            font-size: 1.25rem;
            font-weight: bold;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
                "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .modal-header1 .close-button1 {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body1 {
            padding: 10px 15px;
            font-weight: 700;
            font-family: "Roboto Slab", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
                "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        #overlay1 {
            position: fixed;
            opacity: 0;
            transition: 200ms ease-in-out;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        #overlay1.active {
            opacity: 1;
            pointer-events: all;
        }

        .color {
            animation: change 15s infinite;
        }

        @keyframes change {
            0% {
                background-color: #1abc9c;
            }

            10% {
                background-color: #2ecc71;
            }

            20% {
                background-color: #3498db;
            }

            30% {
                background-color: #9b59b6;
            }

            40% {
                background-color: #e74c3c;
            }

            50% {
                background-color: #fed136;
            }

            60% {
                background-color: #5bbf42;
            }

            70% {
                background-color: #41cedb;
            }

            80% {
                background-color: #8787f2;
            }

            90% {
                background-color: #4381c1;
            }

            100% {
                background-color: #a37871;
            }
        }
    </style>
@endpush

@section('main-content')

    <div class="container" id="containers">
        <div class="row mx-auto mt-4 mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center text-stroke">
                    Selamat Datang!
                </h3>
                <p class="text-center" style="color:#fff;">
                    Silahkan isikan nama-nama pilihan untuk melakukan Name Polling
                </p>
            </div>
        </div>
        <div class="row inputnama">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">1</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama peserta..." aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row inputnama">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">2</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama peserta..." aria-label="Username"
                        aria-describedby="basic-addon2">
                </div>
            </div>
        </div>
        <div class="row inputnama">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">3</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama peserta..." aria-label="Username"
                        aria-describedby="basic-addon3">
                </div>
            </div>
        </div>
        <div class="row inputnama">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon4">4</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama peserta..." aria-label="Username"
                        aria-describedby="basic-addon4">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                <button id="addParticipantButton" class="btn btn-md btn-info">
                    Tambah Nama
                </button>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        document.getElementById('addParticipantButton').onclick = function() {
            // Ambil container
            var container = document.getElementById('containers');
            console.log(container);

            // Hitung jumlah elemen "row" yang sudah ada
            var count = container.getElementsByClassName('inputnama').length + 1;
            console.log(count);

            // Buat elemen div baru dengan class "row"
            var newDiv = document.createElement('div');
            newDiv.className = 'row inputnama';

            // Tambahkan HTML ke dalam elemen div yang baru
            newDiv.innerHTML = `
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon${count}">${count}</span> 
                        </div>
                        <input type="text" class="form-control" placeholder="Nama peserta..." aria-label="Username"
                            aria-describedby="basic-addon${count}">
                    </div>
                </div>
            `;

            console.log(newDiv);

            // Tambahkan elemen div baru ke dalam container
            container.appendChild(newDiv);
        };
    </script>
@endpush
