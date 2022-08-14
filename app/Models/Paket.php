<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_paket';
    protected $fillable = [
        'id',
        'user_id',
        'nama_penerima',
        'telepon_penerima',
        'kota_penerima',
        'alamat_penerima',
        'jenis_paket',
        'jumlah_paket',
        'berat_paket',
        'panjang_paket',
        'lebar_paket',
        'tinggi_paket',
        'volume_paket',
        'gambar_bukti_transfer',
        'harga',
        'no_resi',
        'gambar_no_resi',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'jumlah_paket' => 'integer',
        'berat_paket' => 'integer',
        'panjang_paket' => 'integer',
        'lebar_paket' => 'integer',
        'tinggi_paket' => 'integer',
        'volume_paket' => 'integer',
        'harga' => 'integer',
        'status' => 'integer',
    ];

    protected $with = [
        'user'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id')->withTrashed();
    }
}
