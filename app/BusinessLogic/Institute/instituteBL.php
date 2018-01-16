<?php

namespace App\BusinessLogic\institute;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;

use App\Model\Institute\Institute ;
use App\Common\UserCommon ;

class InstituteBL 
{
    public static function instituteAssignDefaultValue($instituteInfo)
    {
    	$institute ;
        //basic info
    	$institute['Name'] = isset($instituteInfo['instituteName']) ? $instituteInfo['instituteName'] : "" ;
        $institute['ShortName'] = isset($instituteInfo['instituteShortName']) ? $instituteInfo['instituteShortName'] : "" ;
        $institute['FullName'] = isset($instituteInfo['instituteFullName']) ? $instituteInfo['instituteFullName'] : "" ;
        $institute['ParentId'] = isset($instituteInfo['instituteParentId']) ? $instituteInfo['instituteParentId'] : "" ;
        $institute['TypeId'] = isset($instituteInfo['instituteType']) ? $instituteInfo['instituteType'] : 0 ;
        $institute['RunningSince'] = isset($instituteInfo['instituteRunningSince']) ? $instituteInfo['instituteRunningSince'] : "" ;
        $institute['Summary'] = isset($instituteInfo['summary']) ? $instituteInfo['summary'] : "" ;

        //address
        $institute['StateName'] = isset($instituteInfo['state']) ? $instituteInfo['state'] : '' ;
        $institute['StateId'] = isset($instituteInfo['stateId']) ? $instituteInfo['stateId'] : '0';
        $institute['CityId'] = isset($instituteInfo['cityId']) ? $instituteInfo['cityId'] : '' ;
        $institute['CityName'] = isset($instituteInfo['city']) ? $instituteInfo['city'] : '0' ;
        $institute['AreaName'] = isset($instituteInfo['cityArea']) ? $instituteInfo['cityArea'] : '' ;
        $institute['AreaId'] = isset($instituteInfo['areaId']) ? $instituteInfo['areaId'] : '0' ;
        $institute['Address'] = isset($instituteInfo['address']) ? $instituteInfo['address'] : '' ;

        $institute['Status'] = isset($instituteInfo['status']) ? $instituteInfo['status'] : '0' ;
        return $institute ;

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function instituteRegistration(array $data)
    {
        return Validator::make($data, [
            'instituteName' =>  array('required','regex:/^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/u' ),
            'state' => 'required|max:30',
            'stateId' => 'required|digits:1',
            'city' => 'required|max:30',
            'cityId' => 'required|digits:1' ,
            'cityArea' => 'required|max:30',
            'areaId' => 'required|digits:1',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users',
            'mobileNo' => 'required|digits:10',
            'password' => 'required|min:6|confirmed',
        ]);
    }

        /**
         *  method to check user is instituteadmin or super admin 
         */ 
    public static function hasPermissionToUpdate($institute_id){
        if(UserCommon::isLoogedInUserSuperAdmin())
            return true;
        $user_id = UserCommon::getLoogedInUserId();
        if($user_id == 0)
            return false;
        $instituteModel = new Institute();

        $institute = $instituteModel->getInstituteByInstituteId($institute_id);
        echo $institute;
        if($user_id == $institute[0]->AdminId)
            return true;
        return false;
    }   
}
