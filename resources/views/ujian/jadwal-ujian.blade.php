@extends('layouts.dashboard-layouts')
@section('title', 'Ujian Kepolisian')
@section('content-prefix', 'Bank Soal')
@section('content-header', 'Dashboard - Bank Soal')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4>
                            <b>
                                Daftar Uji Kompetensi
                            </b>
                        </h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#tambahdatamodal">
                            <b>
                                TAMBAH DATA
                            </b>
                        </button>
                    </div>

                    {{-- MODAL TAMBAH DATA UJIAN --}}
                    <div class="modal fade" id="tambahdatamodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Form Tambah Data UKOM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('post-tambah-ujian') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="ujian_nama">Nama Ujian</label>
                                                    <input type="text" class="form-control" id="ujian_nama"
                                                        placeholder="Contoh : Bahasa Indonesia" name="ujian_nama">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="ujian_menit">Waktu (Menit)</label>
                                                    <input type="number" class="form-control" id="ujian_menit"
                                                        placeholder="Contoh : Bahasa Indonesia" name="ujian_menit"
                                                        maxlength="3">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="ukom_id">Pilih UKOM</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="ukom_id"
                                                        aria-placeholder="...">
                                                        @foreach ($ukom as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->ukom_nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-warning"
                                            data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-info">Tambah Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Ujian</th>
                                    <th>Waktu</th>
                                    <th>Jumlah Soal</th>
                                    <th>Token</th>
                                    <th>Status</th>
                                    <th>Tanggal dibuat</th>
                                    <th>UKOM</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($ujian as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->ujian_nama }}</td>
                                        <td>{{ $item->ujian_menit }} Menit</td>
                                        <td>{{ $item->ujian_jumlah_soal }}</td>
                                        <td>{{ $item->ujian_token }}</td>
                                        <td>{{ $item->ujian_status }}</td>
                                        <td>{{ date('d-m-Y / H:i', strtotime($item->ujian_tanggal_dibuat)) }}</td>
                                        <td>{{ $item->ukom->ukom_nama }}</td>

                                        <td class="d-flex justify-content-center mx-auto">
                                            <div class="row btn-group">
                                                <div class="col-sm-12 col-md-12 col-lg-12 btn-group">
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-success mr-1">Lihat</button>
                                                    <button
                                                        onclick="location.href = '{{ route('lihat-soal', $item->id) }}';"
                                                        type="button" class="btn btn-sm btn-info mr-1">Pilih Ukom</button> --}}
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modalhapus{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>

                                            {{-- MODAL HAPUS UKOM --}}
                                            <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Hapus data
                                                                Ujian
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="{{ route('hapus-ujian', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_ukom"
                                                                value="{{ $item->id }}">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        Apakah anda Yakin ingin menghapus data ini?
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                        </td>

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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
