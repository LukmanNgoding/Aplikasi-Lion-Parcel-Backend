@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark ml-4">Data Member</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content pr-5 pl-5">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('backend.member.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 50px">Foto</th>
                                        <th>Nama</th>
                                        <th style="width: 200px">Email</th>
                                        <th style="width: 200px">Telepon</th>
                                        <th style="width: 150px">Jenis Kelamin</th>
                                        <th style="width: 150px">Kota</th>
                                        <th style="width: 150px">Alamat</th>
                                        <th style="width: 150px; text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><center><img src="{{ asset('photo/'.$item->foto) }}" style="height: 50px" class="rounded"></center></td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->telepon }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->kota }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('backend.member.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
                                                <a href="{{ route('backend.member.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini??')"> <i class="fa fa-trash"></i> Delete</a>
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
