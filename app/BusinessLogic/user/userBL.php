<?php

namespace App\BusinessLogic\user;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class UserBL 
{
    public static function userAssignDefaultValue($userDetail)
    {
    	$user ;
    	$user['FirstName'] = isset($userDetail['firstName']) ? $userDetail['firstName'] : "" ;
        $user['LastName'] = isset($userDetail['lastName']) ? $userDetail['lastName'] : '' ;
        $user['Email'] = isset($userDetail['email']) ? $userDetail['email'] : "";
        $user['MobileNo'] = isset($userDetail['mobileNo']) ? $userDetail['mobileNo'] : '' ;
        $user['Password'] = isset($userDetail['password']) ? $userDetail['password'] : '' ;
        $user['Status'] = isset($userDetail['status']) ? $userDetail['status'] : '0' ;
        $user['UserType'] = isset($userDetail['userType']) ? $userDetail['userType'] : '0' ;

        return $user ;
    }
}