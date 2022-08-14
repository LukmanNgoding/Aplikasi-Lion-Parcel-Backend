@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Pengaturan</h1>
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
                                <form action="{{ route('backend.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Whatsapp <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="whatsapp" class="form-control" value="{{ $item->whatsapp }}" required>
                                            @if ($errors->has('whatsapp'))
                                                <span style="color:red;">{{ $errors->first('whatsapp') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Web Lion Parcel <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="web_lion_parcel" class="form-control" value="{{ $item->web_lion_parcel }}" required>
                                            @if ($errors->has('web_lion_parcel'))
                                                <span style="color:red;">{{ $errors->first('web_lion_parcel') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Bank Lion Parcel <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_bank_lion_parcel" class="form-control" value="{{ $item->nama_bank_lion_parcel }}" required>
                                            @if ($errors->has('nama_bank_lion_parcel'))
                                                <span style="color:red;">{{ $errors->first('nama_bank_lion_parcel') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bank Lion Parcel <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="bank_lion_parcel" class="form-control" value="{{ $item->bank_lion_parcel }}" required>
                                            @if ($errors->has('bank_lion_parcel'))
                                                <span style="color:red;">{{ $errors->first('bank_lion_parcel') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nomor Bank Lion Parcel <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nomor_bank_lion_parcel" class="form-control" value="{{ $item->nomor_bank_lion_parcel }}" required>
                                            @if ($errors->has('nomor_bank_lion_parcel'))
                                                <span style="color:red;">{{ $errors->first('nomor_bank_lion_parcel') }}</span>
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
