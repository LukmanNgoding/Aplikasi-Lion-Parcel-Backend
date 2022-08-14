<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifikasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_notifikasi';
    protected $fillable = [
        'id',
        'user_id',
        'paket_id',
        'judul',
        'keterangan'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'paket_id' => 'integer'
    ];

    protected $with = [
        // 'user',
        // 'paket'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id')->withTrashed();
    }

    public function paket(){
        return $this->belongsTo('App\Models\Paket','paket_id')->withTrashed();
    }
}
