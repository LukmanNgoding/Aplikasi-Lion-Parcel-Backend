<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Multipart;
use App\Models\Paket;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function latest(Request $request){
        return $this->responseSuccess(Paket::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->take(5)->get());
    }

    public function list(Request $request){
        return $this->responseSuccess(Paket::whereUserId(auth()->user()->id)->where('status', 'like', '%' . $request->status . '%')->orderBy('id', 'DESC')->paginate(10));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required',
            'telepon_penerima' => 'required',
            'kota_penerima' => 'required',
            'alamat_penerima' => 'required',
            'jenis_paket' => 'required',
            'jumlah_paket' => 'required',
            'berat_paket' => 'required',
            'panjang_paket' => 'required',
            'lebar_paket' => 'required',
            'tinggi_paket' => 'required',
            'volume_paket' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $paket = Paket::create($data);

        Notifikasi::create([
            'user_id' => auth()->user()->id,
            'paket_id' => $paket->id,
            'judul' => 'Pengiriman LPTP'.$paket->id,
            'keterangan' => 'Tunggu ya, Sebentar lagi kurir akan menjemput paketmu'
        ]);
        return $this->responseSuccess($paket);
    }

    public function find($id){
        return $this->responseSuccess(Paket::find($id));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'gambar_bukti_transfer' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        $data = $request->all();
        $paket = Paket::find($id);
        $data['status'] = IS_PAKET_PROSES_VALIDASI_PEMBAYARAN;
        $data['gambar_bukti_transfer'] = Multipart::imageUpload($request->gambar_bukti_transfer);

        $paket->update($data);

        Notifikasi::create([
            'user_id' => auth()->user()->id,
            'paket_id' => $paket->id,
            'judul' => 'Pengiriman LPTP'.$paket->id,
            'keterangan' => 'Tunggu sebentar ya, kurir sedang melakukan validasi pembayaranmu'
        ]);
        return $this->responseSuccess('OK');
    }

    public function setCancel($id){
        Paket::find($id)->update([
            'status' => IS_PAKET_DIBATALKAN
        ]);

        Notifikasi::create([
            'user_id' => auth()->user()->id,
            'paket_id' => $id,
            'judul' => 'Pengiriman LPTP'.$id,
            'keterangan' => 'Pengiriman berhasil dibatalkan'
        ]);
        return $this->responseSuccess('OK');
    }
}
