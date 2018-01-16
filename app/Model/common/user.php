<?php

namespace App\Model\common;
use DB;

class User 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  createUser($user)
    {
        $userParam = array($user['FirstName'],$user['LastName'], $user['Email'],$user['MobileNo'],
            bcrypt($user['Password']),$user['Status'],$user['UserType']);
        //return $userParam;
        $user = DB::select('call  user_create(?,?,?,?,?,?,?)', $userParam);
        return $user;
    }
    
}
