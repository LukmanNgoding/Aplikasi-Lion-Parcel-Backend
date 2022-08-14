<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;
use JWTAuth;
use Multipart;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['foto'] = Multipart::imageUpload($request->foto);
        $user = User::create($data);
        return $this->responseSuccess(JWTAuth::fromUser($user));
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        if($token = JWTAuth::attempt($request->only('email', 'password'))){
            return $this->responseSuccess($token);
        }else{
            return $this->responseFailed('Email atau password anda salah');
        }
    }

    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        $user = User::whereEmail($request->email)->first();
        if($user){
            $email = $user->email;
            $password = strtoupper(Str::random(6));
            $user->update(['password' => bcrypt($password)]);
            // $code = mt_rand(1000, 9999);
            // $user->update(['verification_code' => $code]);

            Mail::send('forgot-password', ['password' => $password],
                function ($message) use ($email)
                {
                    $message->subject('[FORGOT PASSWORD]');
                    $message->from(env('MAIL_USERNAME'), 'Lion Parcel');
                    $message->to($email);
                }
            );

            return $this->responseSuccess('OK');
        }else{
            return $this->responseFailed('Email tidak terdaftar');
        }
    }

    public function anotherLogin(Request $request){
        if($request->path() == 'api/user/login/google'){
            $another_user = User::whereGoogleUid($request->google_uid)->first();
        }else if($request->path() == 'api/user/login/facebook'){
            $another_user = User::whereFacebookUid($request->facebook_uid)->first();
        }
        $email = User::whereEmail($request->email)->first();

        if($another_user){
            return $this->responseSuccess(JWTAuth::fromUser($another_user));
        }else if($email){
            $email->update([
                'google_uid' => $request->google_uid ? $request->google_uid : $email->google_uid,
                'facebook_uid' => $request->facebook_uid ? $request->facebook_uid : $email->facebook_uid,
            ]);
            return $this->responseSuccess(JWTAuth::fromUser($email));
        }else{
            $data = $request->all();
            $data['username'] = $request->name;
            $data['password'] = bcrypt($data['google_uid'] ?? $data['facebook_uid']);
            $user = User::create($data);
            return $this->responseSuccess(JWTAuth::fromUser($user));
        }
    }
}
