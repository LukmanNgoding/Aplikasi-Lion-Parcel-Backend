<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;
use App\Models\Paket;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard', [
            'member'            => User::whereRole(IS_MEMBER)->count(),
            'paket'             => Paket::count(),
        ]);
    }

    public function indexProfile(){
        return view('backend.profile');
    }

    public function UpdateProfile(Request $request){
        $item = User::find(auth()->user()->id);
        $data = $request->all();
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $item->password;
        }
        $item->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
