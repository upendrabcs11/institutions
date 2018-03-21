<?php

namespace App\BusinessLogic\institute;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;

use App\Model\Institute\Institute ;
use App\Common\UserCommon ;

class InstituteBL 
{
    public static function updateInstituteKeyMapping($insInfo)
    {
    	$institute =[];
    	$institute['Name'] = isset($insInfo['InstituteName'])? $insInfo['InstituteName'] : null ;
        //address
        $institute['StateName'] = isset($insInfo['State'])? $insInfo['State'] : null ;
        $institute['StateId'] =   isset($insInfo['StateId'])? $insInfo['StateId'] : null ;
        $institute['CityId'] =  isset($insInfo['CityId'])? $insInfo['CityId'] : null ;
        $institute['CityName'] = isset($insInfo['City'])? $insInfo['City'] : null ;
        $institute['AreaName'] = isset($insInfo['CityArea'])? $insInfo['CityArea'] : null ;
        $institute['AreaId'] = isset($insInfo['CityAreaId'])? $insInfo['CityAreaId'] : null ;
        $institute['Address'] =  isset($insInfo['Address'])? $insInfo['Address'] : null ;

        $institute['ShortName'] = isset($insInfo['InstituteShortName'])? 
                                                    $insInfo['InstituteShortName'] : null ;
        $institute['FullName'] = isset($insInfo['InstituteFullName'])? 
                                                    $insInfo['InstituteFullName'] : null ;
        $institute['ParentId'] = isset($insInfo['InstituteParentId'])? 
                                                    $insInfo['InstituteParentId'] : null ;

        $institute['RunningSince'] =  isset($insInfo['InstituteRunningSince'])? 
                                                    $insInfo['InstituteRunningSince'] : null ;
        $institute['Summary'] = isset($insInfo['InstituteSummary'])? 
                                        $insInfo['InstituteSummary'] : null ;

        // at time of insertation
        $institute['Status'] =isset($insInfo['Status'])? $insInfo['Status'] : null ; 
        $institute['TypeId'] = isset($insInfo['InstituteTypeId'])? $insInfo['InstituteTypeId'] : null ;
        $institute['UserId'] = UserCommon::getLoogedInUserId();
        return $institute ;

    }
      
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function registrationValidation(array $data)
    {
        return Validator::make($data, [
            'InstituteName' =>  array('required','regex:/^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/u' ),
            'State' => 'required|max:30',
            'StateId' => 'required|exists:states,id',
            'City' => 'required|max:30',
            'CityId' => 'required|exists:cities,id',
            'CityArea' => 'required|max:30',
            'CityAreaId' => 'required|exists:city_areas,id',
            'FirstName' => 'required|min:3|max:30',
            'LastName' => 'required|min:3|max:30',
            'email' => 'required|email|max:255|unique:users',
            'MobileNo' => 'required|digits:10',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function basicInfoValidation(array $data)
    {
        return Validator::make($data, [
            'InstituteName' =>  array('required','regex:/^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/u' ),
            'RunningSince' => 'nullable|date',
            'ParentId' => 'nullable|exists:institutes,id',
            'InstituteType' => 'required|exists:institute_types,id',
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function instituteAddress(array $data)
    {
        return Validator::make($data, [
            'State' => 'required|max:30',
            'StateId' => 'required|exists:states,id',
            'City' => 'required|max:30',
            'CityId' => 'required|exists:cities,id',
            'CityArea' => 'required|max:30',
            'CityAreaId' => 'required|exists:city_areas,id',
        ]);
    }
        /**
         *  method to check user is instituteadmin or super admin 
         */ 
    public static function hasPermissionToUpdate($institute_id){
        if(UserCommon::isLoogedInUserSuperAdmin()){
           return true; 
         }
            

        $user_id = UserCommon::getLoogedInUserId();
        if($user_id == 0)
            return false;
        $instituteModel = new Institute();

        $institute = $instituteModel->getInstituteByInstituteId($institute_id);
        if($user_id == $institute[0]->AdminUserId)
            return true;

        return false;
    }   
}
