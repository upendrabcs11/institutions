<?php

namespace App\Common;
use  Illuminate\Support\Facades\Auth;
use App\User;
class Logger 
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public static function createUser(array $data)
    {
        $user = null ;
        try{
            $user =  User::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }catch(Exception $ex){
            //log 
        }
        return $user ;
    }
}
