<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function list(Request $request){
        return $this->responseSuccess(Notifikasi::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->take(5)->get());
    }
}
