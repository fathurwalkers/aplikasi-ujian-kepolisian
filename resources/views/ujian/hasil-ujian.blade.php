@extends('layouts.dashboard-layouts')
@section('title', 'Ujian Kepolisian')
@section('content-prefix', 'Hasil Ujian')
@section('content-header', 'Dashboard - Hasil Ujian')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <h4>
                        <b>
                            Hasil Ujian
                        </b>
                    </h4>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Uji Kompetensi</th>
                                    <th>Peserta</th>
                                    <th>Jumlah Soal</th>
                                    <th>Waktu Ujian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil as $item)
                                    @php
                                        $get_ujian = $ujian->where('ukom_id', $item->ukom->id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->ukom->ukom_nama }}
                                        </td>
                                        <td>
                                            {{ $item->data->data_nama }}
                                        </td>
                                        <td>
                                            @if ($get_ujian->ujian_jumlah_soal == null)
                                                KOSONG
                                            @else
                                                {{ $get_ujian->ujian_jumlah_soal }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($get_ujian->ujian_menit == null)
                                                KOSONG
                                            @else
                                                {{ $get_ujian->ujian_menit }}
                                            @endif
                                        </td>
                                        <td class="mx-auto">
                                            <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                            <button type="button" class="btn btn-sm btn-info">Ubah</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#modalhapus{{ $item->id }}">Hapus</button>

                                            {{-- MODAL HAPUS UJIAN --}}
                                            <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="{{ route('hapus-ujian', $item->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_ujian"
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
