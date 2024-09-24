@extends('layouts.dashboard-layouts')
@section('title', 'Ujian Kepolisian')
@section('content-prefix', 'Bank Soal')
@section('content-header', 'Dashboard - Bank Soal')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-2">
        <div class="card-body">

            <div class="container">

                @php
                    switch ($ukom->ukom_kategori) {
                        case 'reguler':
                            $post_route = route('post-tambah-soal-reguler');
                            break;
                        case 'kepribadian':
                            $post_route = route('post-tambah-soal-reguler');
                            break;
                        case 'kecerdasan':
                            $post_route = route('post-tambah-soal-reguler');
                            break;
                        case 'campur':
                            $post_route = route('post-tambah-soal-campur');
                            break;
                        case 'kecermatan':
                            $post_route = route('post-tambah-soal-kecermatan');
                            break;
                    }
                @endphp
                <form action="{{ $post_route }}" method="POST" accept-charset="UTF-8"
                    @if ($ukom->ukom_kategori == 'campur') enctype="multipart/form-data" @endif>
                    @csrf

                    <input type="hidden" name="ukom_id" value="{{ $ukom->id }}">

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>
                                <b>Tambah Soal - {{ $count_soal }}</b>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p>
                                Silahkan masukkan informasi dibawah ini jika ingin melakukan penambahan Bank Soal pada Uji
                                Kompetensi
                                <b>{{ $ukom->ukom_nama }}</b> ini.
                            </p>
                            <p>
                                Tipe Soal : <b> {{ strtoupper($ukom->ukom_kategori) }} </b>
                            </p>
                        </div>
                    </div>

                    @switch($ukom->ukom_kategori)
                        @case('kecermatan')
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="soal_kecermatan_original_isi">Soal Kecermatan</label>
                                        <input type="text" maxlength="5" class="form-control" id="soal_kecermatan_original_isi"
                                            placeholder="Masukkan 5 Karakter Huruf / Angka acak" name="soal_kecermatan_original_isi"
                                            required accept-charset="UTF-8">
                                    </div>
                                </div>
                            </div>
                        @break

                        {{-- // =========================================================================== --}}
                        @case('campur')
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label for="soal_isi">
                                        <h6 class="text-dark">Isi Soal</h6>
                                    </label>
                                    <textarea id="" class="summernoteclass" name="soal_isi" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="soal_jawaban">
                                            <h6 class="text-dark">Kunci Jawaban</h6>
                                        </label>
                                        <select class="form-control" id="soal_jawaban" name="soal_jawaban">
                                            <option default value="A">A</option>
                                            <option value="B">B</option>
                                            @if ($ukom->ukom_kategori !== 'kepribadian')
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="container">

                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="soal_opsi_a">Opsi A</label>
                                            <input type="text" class="form-control" id="soal_opsi_a"
                                                placeholder="Masukkan opsi pilihan A" name="soal_opsi_a">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Gambar Opsi A : </label>
                                            <input type="file" class="form-control-file" onchange="preview_image(event)"
                                                name="soal_gambar_a">
                                            <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg. Biarkan kosong jika
                                                tidak ada gambar</small>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="soal_opsi_b">Opsi B</label>
                                            <input type="text" class="form-control" id="soal_opsi_b"
                                                placeholder="Masukkan opsi pilihan B" name="soal_opsi_b">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Gambar Opsi B : </label>
                                            <input type="file" class="form-control-file" onchange="preview_image(event)"
                                                name="soal_gambar_b">
                                            <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg. Biarkan kosong jika
                                                tidak ada gambar</small>
                                        </div>
                                    </div>
                                </div>



                                @if ($ukom->ukom_kategori !== 'kepribadian')
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="soal_opsi_c">Opsi C</label>
                                                <input type="text" class="form-control" id="soal_opsi_c"
                                                    placeholder="Masukkan opsi pilihan C" name="soal_opsi_c">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Gambar Opsi C : </label>
                                                <input type="file" class="form-control-file" onchange="preview_image(event)"
                                                    name="soal_gambar_c">
                                                <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg. Biarkan kosong
                                                    jika
                                                    tidak ada gambar</small>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="soal_opsi_d">Opsi D</label>
                                                <input type="text" class="form-control" id="soal_opsi_d"
                                                    placeholder="Masukkan opsi pilihan D" name="soal_opsi_d">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Gambar Opsi D : </label>
                                                <input type="file" class="form-control-file" onchange="preview_image(event)"
                                                    name="soal_gambar_d">
                                                <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg. Biarkan kosong
                                                    jika
                                                    tidak ada gambar</small>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="soal_opsi_e">Opsi E</label>
                                                <input type="text" class="form-control" id="soal_opsi_e"
                                                    placeholder="Masukkan opsi pilihan E" name="soal_opsi_e">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Gambar Opsi E : </label>
                                                <input type="file" class="form-control-file" onchange="preview_image(event)"
                                                    name="soal_gambar_e">
                                                <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg. Biarkan kosong
                                                    jika
                                                    tidak ada gambar</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                            </div>
                        @break

                        {{-- // =========================================================================== --}}
                        @case('reguler' && 'kecerdasan' && 'kepribadian')
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label for="soal_isi">
                                        <h6 class="text-dark">Isi Soal</h6>
                                    </label>
                                    <textarea id="" class="summernoteclass" name="soal_isi" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="soal_jawaban">
                                            <h6 class="text-dark">Kunci Jawaban</h6>
                                        </label>
                                        <select class="form-control" id="soal_jawaban" name="soal_jawaban">
                                            <option default value="A">A</option>
                                            <option value="B">B</option>
                                            @if ($ukom->ukom_kategori !== 'kepribadian')
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="soal_opsi_a">Opsi A</label>
                                        <input type="text" class="form-control" id="soal_opsi_a"
                                            placeholder="Masukkan opsi pilihan A" name="soal_opsi_a">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="soal_opsi_b">Opsi B</label>
                                        <input type="text" class="form-control" id="soal_opsi_b"
                                            placeholder="Masukkan opsi pilihan B" name="soal_opsi_b">
                                    </div>
                                </div>
                            </div>
                            @if ($ukom->ukom_kategori !== 'kepribadian')
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="soal_opsi_c">Opsi C</label>
                                            <input type="text" class="form-control" id="soal_opsi_c"
                                                placeholder="Masukkan opsi pilihan C" name="soal_opsi_c">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="soal_opsi_d">Opsi D</label>
                                            <input type="text" class="form-control" id="soal_opsi_d"
                                                placeholder="Masukkan opsi pilihan D" name="soal_opsi_d">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="soal_opsi_e">Opsi E</label>
                                            <input type="text" class="form-control" id="soal_opsi_e"
                                                placeholder="Masukkan opsi pilihan E" name="soal_opsi_e">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @break

                        {{-- // =========================================================================== --}}

                    @endswitch

                    <div class="row mt-2 mb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-md btn-info">
                                Tambah Data
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4>
                            <b>
                                Daftar Soal - ({{ $ukom->ukom_nama }})
                            </b>
                        </h4>
                    </div>
                    {{-- <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <button class="btn btn-md btn-info" data-toggle="modal" data-target="#tambahdatamodal">TAMBAH
                            DATA</button>
                    </div> --}}

                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori Soal</th>
                                    @if ($ukom->ukom_kategori == 'kecermatan')
                                        <th>Soal Original</th>
                                    @endif
                                    <th>Isi Soal</th>
                                    <th>Kunci Jawaban</th>
                                    <th>Bobot Nilai</th>
                                    <th>UKOM</th>
                                    {{-- <th>Opsi</th> --}}
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($soal as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strtoupper($item->soal_kategori) }}</td>
                                        @if ($item->soal_kategori == 'kecermatan')
                                            <td>{{ $item->soal_kecermatan_original_isi }}</td>
                                        @endif
                                        <td>{!! $item->soal_isi !!}</td>
                                        <td>{{ $item->soal_jawaban }}</td>
                                        <td>{{ $item->soal_bobot_nilai }}</td>
                                        <td>{{ $item->ukom->ukom_nama }}</td>

                                        {{-- <td class="d-flex justify-content-center mx-auto">
                                        <div class="row btn-group">
                                            <div class="col-sm-12 col-md-12 col-lg-12 btn-group">
                                                <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                                <button onclick="location.href = '{{ route('lihat-soal', $item->id) }}';" type="button" class="btn btn-sm btn-info mr-1">Pilih Ukom</button>
                                            </div>
                                        </div>
                                    </td> --}}

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#soal_isi').summernote();
            $('.summernoteclass').summernote();

            $('#soal_kecermatan_original_isi').on('keypress', function(event) {
                var regex = new RegExp("^[a-zA-Z0-9_@./#&+-)]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
