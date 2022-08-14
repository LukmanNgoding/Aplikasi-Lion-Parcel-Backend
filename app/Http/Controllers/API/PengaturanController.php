<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function list(Request $request){
        return $this->responseSuccess(Pengaturan::first());
    }
}
