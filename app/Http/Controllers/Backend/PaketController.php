<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\Paket;
use App\Models\Notifikasi;

class PaketController extends Controller
{
    public function index(){
        return view('backend.paket.index', [
            'items' => Paket::orderBy('id', 'DESC')->get()
        ]);
    }

    public function edit($id){
        return view('backend.paket.edit', [
            'item' => Paket::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $item = Paket::find($id);
        if($request->gambar_no_resi){
            $this->validate($request,[
                'gambar_no_resi' => 'max:2024'
            ]);
            $data['gambar_no_resi'] = Multipart::imageUpload($request->gambar_no_resi);
        }else{
            $data['gambar_no_resi'] = $item->gambar_no_resi;
        }
        $item->update($data);
        
        if($request->status == IS_PAKET_PROSES_VALIDASI_DATA && $item->status != IS_PAKET_PROSES_VALIDASI_DATA){
            Notifikasi::create([
                'user_id' => auth()->user()->id,
                'paket_id' => $item->id,
                'judul' => 'Pengiriman LPTP'.$item->id,
                'keterangan' => 'Tunggu sebentar ya, kurir sedang melakukan validasi paketmu'
            ]);
        }else if($request->status == IS_PAKET_MENUNGGU_PEMBAYARAN && $item->status != IS_PAKET_MENUNGGU_PEMBAYARAN){
            Notifikasi::create([
                'user_id' => auth()->user()->id,
                'paket_id' => $item->id,
                'judul' => 'Pengiriman LPTP'.$item->id,
                'keterangan' => 'Paket sudah divalidasi. Silahkan melakukan pembayaran'
            ]);
        }else if($request->status == IS_PAKET_PROSES_VALIDASI_PEMBAYARAN && $item->status != IS_PAKET_PROSES_VALIDASI_PEMBAYARAN){
            Notifikasi::create([
                'user_id' => auth()->user()->id,
                'paket_id' => $item->id,
                'judul' => 'Pengiriman LPTP'.$item->id,
                'keterangan' => 'Tunggu sebentar ya, kurir sedang melakukan validasi pembayaranmu'
            ]);
        }else if($request->status == IS_PAKET_SELESAI && $item->status != IS_PAKET_SELESAI){
            Notifikasi::create([
                'user_id' => auth()->user()->id,
                'paket_id' => $item->id,
                'judul' => 'Pengiriman LPTP'.$item->id,
                'keterangan' => 'Pengiriman paket telah berjalan. Tunggu paket sampai datang'
            ]);
        }else if($request->status == IS_PAKET_DIBATALKAN && $item->status != IS_PAKET_DIBATALKAN){
            Notifikasi::create([
                'user_id' => auth()->user()->id,
                'paket_id' => $item->id,
                'judul' => 'Pengiriman LPTP'.$item->id,
                'keterangan' => 'Pengiriman berhasil dibatalkan'
            ]);
        }
        return redirect()->route('backend.paket')->with('success', 'Berhasil mengubah data');
    }
}
