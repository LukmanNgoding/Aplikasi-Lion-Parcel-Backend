<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(Request $request){
        return $this->responseSuccess(auth()->user());
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
        ]);

        if($validator->fails()){
            return $this->responseFailed($validator->errors()->first());
        }

        if($request->password && $request->password_confirmation){
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return $this->responseFailed('Your old password is wrong');
            }
        }

        $data = $request->all();
        $data['password'] = $request->password ? bcrypt($request->password) : auth()->user()->password;
        $data['foto'] = $request->foto ? Multipart::imageUploadUser($request->foto) : auth()->user()->foto;

        auth()->user()->update($data);
        return $this->responseSuccess('OK');
    }
}