<?php

namespace App\BusinessLogic\User;

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
        $user['UserType'] = isset($userDetail['UserType'])?$userDetail['UserType'] : null ;
        $user['Status'] =isset($userDetail['Status'])? $userDetail['Status'] : null ; 

        return $user ;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function userValidation(array $data)
    {
        return Validator::make($data, [
            'FirstName' => 'required|min:3|max:30',
            'LastName' => 'required|min:3|max:30',
            'email' => 'required|email|max:255|unique:users',
            'MobileNo' => 'required|digits:10',
            'password' => 'required|min:6|confirmed',
            'UserType' => 'required|exists:user_types,id',
        ]);
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