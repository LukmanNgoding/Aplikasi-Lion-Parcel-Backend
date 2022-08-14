@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Paket</h1>
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
                                <form action="{{ route('backend.paket.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold"></label>
                                        <div class="col-sm-10">
                                            <img src="{{ asset('photo/'.$item->user->foto) }}" style="width: 150px;" class="rounded">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Pengirim</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->user->nama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kota Pengirim</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->user->kota }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Telepon Pengirim</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->user->telepon }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Penerima</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->nama_penerima }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Kota Penerima</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->kota_penerima }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alamat Penerima</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->alamat_penerima }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jenis Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->jenis_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->jumlah_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Berat Paket (KG)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->berat_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Panjang Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->panjang_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Lebar Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->lebar_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Tinggi Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->tinggi_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Volume Paket (KG)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->volume_paket }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bukti Transfer</label>
                                        <div class="col-sm-10">
                                            @if ($item->gambar_bukti_transfer)
                                                <a target="__blank" href="{{ asset('photo/'.$item->gambar_bukti_transfer) }}" class="btn btn-primary">Lihat Bukti Transfer</a>
                                            @else
                                                <input type="text" class="form-control" value="Tidak Tersedia" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="harga" class="form-control" value="{{ $item->harga }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">No Resi</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_resi" class="form-control" value="{{ $item->no_resi }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Gambar No Resi</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="gambar_no_resi" class="dropify" data-show-remove="false" data-default-file="{{ $item->gambar_no_resi ? asset('photo/'.$item->gambar_no_resi) : '' }}">
                                            @if ($errors->has('gambar_no_resi'))
                                                <span style="color:red;">{{ $errors->first('gambar_no_resi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                <option value="{{ IS_PAKET_MENUNGGU_PENJEMPUTAN_KURIR }}" @if($item->status == IS_PAKET_MENUNGGU_PENJEMPUTAN_KURIR) selected @endif>Menunggu Penjemputan Kurir</option>
                                                <option value="{{ IS_PAKET_PROSES_VALIDASI_DATA }}" @if($item->status == IS_PAKET_PROSES_VALIDASI_DATA) selected @endif>Proses Validasi Data</option>
                                                <option value="{{ IS_PAKET_MENUNGGU_PEMBAYARAN }}" @if($item->status == IS_PAKET_MENUNGGU_PEMBAYARAN) selected @endif>Menunggu Pembayaran</option>
                                                <option value="{{ IS_PAKET_PROSES_VALIDASI_PEMBAYARAN }}" @if($item->status == IS_PAKET_PROSES_VALIDASI_PEMBAYARAN) selected @endif>Proses Validasi Pembayaran</option>
                                                <option value="{{ IS_PAKET_SELESAI }}" @if($item->status == IS_PAKET_SELESAI) selected @endif>Selesai</option>
                                                <option value="{{ IS_PAKET_DIBATALKAN }}" @if($item->status == IS_PAKET_DIBATALKAN) selected @endif>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary"><i class="fa fa-check"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
