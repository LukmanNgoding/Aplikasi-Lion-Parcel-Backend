<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pengaturan;

class PenganturanController extends Controller
{
    public function index(){
        return view('backend.pengaturan.index', [
            'item' => Pengaturan::first()
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        $item = Setting::first();
        $item->update($data);
        return redirect()->route('backend.pengaturan')->with('success', 'Berhasil mengubah data');
    }
}
