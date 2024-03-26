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
                                Daftar UKOM
                            </b>
                        </h4>
                    </div>

                    {{-- MODAL TAMBAH DATA UKOM --}}
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
                                <form action="{{ route('post-tambah-ukom') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="ukom_nama">Uji Kompetensi</label>
                                                    <input type="text" class="form-control" id="ukom_nama"
                                                        placeholder="Contoh : Bahasa Indonesia" name="ukom_nama">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                                    <th>UKOM</th>
                                    <th>Kategori UKOM</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ukom as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->ukom_nama }}</td>
                                        <td>{{ strtoupper($item->ukom_kategori) }}</td>
                                        <td class="d-flex justify-content-center mx-auto">

                                            <div class="row btn-group">
                                                <div class="col-sm-12 col-md-12 col-lg-12 btn-group">
                                                    {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                                    <button
                                                        onclick="location.href = '{{ route('lihat-soal', $item->id) }}';"
                                                        type="button" class="btn btn-sm btn-info mr-1">Pilih Ukom</button>
                                                </div>
                                            </div>

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
