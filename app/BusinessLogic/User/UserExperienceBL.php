<?php

namespace App\BusinessLogic\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class UserExperienceBL 
{
  
    public static function updateUserExperienceKeyMapping($userExperience)
    {
    	$usr_Experience ;
    	$usr_Experience['TeacherRoleId'] = isset($userExperience['TeacherRoleId'])? 
                                            $userExperience['TeacherRoleId'] : null ; 
        $usr_Experience['TeacherRoleName'] = $userExperience['TeacherRoleName']  ;
        $usr_Experience['InstituteId'] = isset($userExperience['InstituteId'])? 
                                            $userExperience['InstituteId'] : null ;
        $usr_Experience['InstituteName'] = $userExperience['InstituteName']; 
        $usr_Experience['AboutExperience'] = isset($userExperience['AboutExperience'])? 
                                            $userExperience['AboutExperience'] : null ; 
        $usr_Experience['StartDate'] = isset($userExperience['StartDate'])? 
                                            $userExperience['StartDate'] : null ; 
        $usr_Experience['EndDate'] = isset($userExperience['EndDate'])? 
                                            $userExperience['EndDate'] : null ;
        $usr_Experience['StatusId'] = isset($userExperience['StatusId'])? 
                                            $userExperience['StatusId'] : null ; 
        
        return $usr_Experience ;
        
      // $userExperience_array['updated_by'] = $userExperience['UpdatedBy'] ;
    }
    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function userExperienceValidation(array $data)
    {
        return Validator::make($data, [
            'TeacherRoleId' => 'sometimes|exists:teacher_titles,id',
            'TeacherRoleName' => 'required|min:3|max:50',
            'InstituteId' => 'sometimes|exists:institutes,id',
            'InstituteName' => 'required|min:3|max:100',
            'AboutExperience' => 'required',
            'StartDate' => 'required|date|date_format:Y-m-d|before:EndDate',
            'EndDate' => 'required|date|date_format:Y-m-d|after:StartDate',
        ]);
    }
}