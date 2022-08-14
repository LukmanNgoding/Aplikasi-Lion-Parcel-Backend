<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaturan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_pengaturan';
    protected $fillable = [
        'id',
        'whatsapp',
        'web_lion_parcel',
        'nama_bank_lion_parcel',
        'bank_lion_parcel',
        'nomor_bank_lion_parcel',
    ];

    protected $casts = [
        'id' => 'integer',
        'nomor_bank_lion_parcel' => 'integer'
    ];
}
