<?php

namespace App\BusinessLogic\user;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class UserBL 
{
    public static function updateUserKeyMapping($userDetail)
    {
    	$user ;
    	$user['FirstName'] = $userDetail['FirstName'] ;
        $user['LastName'] = $userDetail['LastName'] ;
        $user['Email'] = $userDetail['email'] ;
        $user['MobileNo'] = $userDetail['MobileNo']  ;
        $user['Password'] = $userDetail['password']  ;

        return $user ;
    }
    public static function buildLoginRequest(Request $request){
        $req_array = $request->all();
        if(isset($req_array['Email']))
             $request->merge(['email' => $req_array['Email']]);
        if(isset($req_array['Password']))
             $request->merge(['password' => $req_array['Password']]);

        return $request;
    }
}