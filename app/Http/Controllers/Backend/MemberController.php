<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;

class MemberController extends Controller
{
    public function index(){
        return view('backend.member.index', [
            'items' => User::whereRole(IS_MEMBER)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function create(){
        return view('backend.member.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'foto' => 'max:2024',
            'email' => 'unique:users'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['role'] = IS_MEMBER;
        $data['foto'] = Multipart::imageUpload($request->foto);
        User::create($data);
        return redirect()->route('backend.member')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id){
        return view('backend.member.edit', [
            'item' => User::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $item = User::find($id);
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $item->password;
        }
        if($request->foto){
            $this->validate($request,[
                'foto' => 'max:2024'
            ]);
            $data['foto'] = Multipart::imageUpload($request->foto);
        }else{
            $data['foto'] = $item->foto;
        }
        User::find($id)->update($data);
        return redirect()->route('backend.member')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id){
        $item = User::find($id);
        $item->delete();
        return redirect()->route('backend.member')->with('success', 'Berhasil menghapus data');
    }
}
