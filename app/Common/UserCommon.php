<?php

namespace App\Common;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserCommon 
{
    /**
     * return looged in user id
     */
    public static function getLoogedInUserId(){
      if(Auth::user() == NULL)
         return 0;
      return Auth::user()->id;
    }
    /**
     * return looged in user id
     */
    public static function getLoogedInUserType(){
      if(Auth::user() == NULL)
          return 0;
      return Auth::user()->user_type;
    }
    /**
     * return looged in user id
     */
    public static function isLoogedInUserSuperAdmin(){
      if(Auth::user() == NULL)
          return false;
      return (Auth::user()->type == 'super admin');
    }
    
}
