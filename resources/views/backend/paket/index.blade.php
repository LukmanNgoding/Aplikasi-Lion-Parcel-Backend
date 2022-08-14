@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark ml-4">Data Paket</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content pr-5 pl-5">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Member</th>
                                        <th style="width: 150px">Kota Pengirim</th>
                                        <th style="width: 150px">Telepon Pengirim</th>
                                        <th style="width: 150px">Kota Penerima</th>
                                        <th style="width: 150px">Telepon Penerima</th>
                                        <th style="width: 200px">Status</th>
                                        <th style="width: 100px; text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->user->kota }}</td>
                                            <td>{{ $item->user->telepon }}</td>
                                            <td>{{ $item->kota_penerima }}</td>
                                            <td>{{ $item->telepon_penerima }}</td>
                                            <td>
                                                @if ($item->status == IS_PAKET_MENUNGGU_PENJEMPUTAN_KURIR)
                                                    Menunggu Penjemputan Kurir
                                                @elseif($item->status == IS_PAKET_PROSES_VALIDASI_DATA)
                                                    Proses Validasi Data
                                                @elseif($item->status == IS_PAKET_MENUNGGU_PEMBAYARAN)
                                                    Menunggu Pembayaran
                                                @elseif($item->status == IS_PAKET_PROSES_VALIDASI_PEMBAYARAN)
                                                    Proses Validasi Pembayaran
                                                @elseif($item->status == IS_PAKET_SELESAI)
                                                    Selesai
                                                @elseif($item->status == IS_PAKET_DIBATALKAN)
                                                    Dibatalkan
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('backend.paket.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
