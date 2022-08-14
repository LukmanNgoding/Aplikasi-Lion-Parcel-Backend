@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Member</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('backend.member.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Foto <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="foto" class="dropify" data-show-remove="false" required>
                                            @if ($errors->has('foto'))
                                                <span style="color:red;">{{ $errors->first('foto') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                            @if ($errors->has('nama'))
                                                <span style="color:red;">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Email <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span style="color:red;">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Password <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                                <span style="color:red;">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Telepon <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                                            @if ($errors->has('telepon'))
                                                <span style="color:red;">{{ $errors->first('telepon') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jenis Kelamin <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @if ($errors->has('jenis_kelamin'))
                                                <span style="color:red;">{{ $errors->first('jenis_kelamin') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kota <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kota" class="form-control" value="{{ old('kota') }}" required>
                                            @if ($errors->has('kota'))
                                                <span style="color:red;">{{ $errors->first('kota') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alamat <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" class="form-control" rows="5" required>{{ old('alamat') }}</textarea>
                                            @if ($errors->has('alamat'))
                                                <span style="color:red;">{{ $errors->first('alamat') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
