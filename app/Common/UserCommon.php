<?php

namespace App\Common;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserCommon 
{
    /**
     * return looged in user id
     */
    public static function getLoggedInUserId(){
      if(Auth::user() == NULL)
         return 0;
      return Auth::user()->id;
    }
    /**
     * return looged in user id
     */
    public static function getLoggedInUserType(){
      if(Auth::user() == NULL)
          return 0;
      return Auth::user()->user_type_id;
    }
    /**
     * return looged in user id
     */
    public static function isLoggedInUserSuperAdmin(){
      if(Auth::user() == NULL)
          return false;
      return (Auth::user()->type == 'super admin');
    }
    
}
