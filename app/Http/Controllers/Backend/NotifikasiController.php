<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index(){
        return view('backend.notifikasi.index', [
            'items' => Notifikasi::orderBy('id', 'DESC')->get()
        ]);
    }
}
