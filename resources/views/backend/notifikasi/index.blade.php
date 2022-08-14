@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark ml-4">Data Notifikasi</h1>
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
                                        <th style="width: 200px">No Resi</th>
                                        <th style="width: 200px">Judul</th>
                                        <th style="width: 600px">Keterangan</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->paket->no_resi }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->keterangan }}</td>
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
