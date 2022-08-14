<?php

namespace App\Helpers;

use App\Models\User;

class GlobalHelper
{
    static function getUserImage($id)
    {
        $user = User::find($id);
        if($user->image){
            if(str_contains($user->image, 'https')){
                return $user->image;
            }else if($user->image){
                return asset('photo/'.$user->image);
            }
        }else{
            return asset('photo/user.png'); 
        }
    }
}