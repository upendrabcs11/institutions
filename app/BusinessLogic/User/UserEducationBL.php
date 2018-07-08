<?php

namespace App\BusinessLogic\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class UserEducationBL 
{
  
    public static function updateUserEducationKeyMapping($userEducation)
    {
    	$usr_education ;
    	$usr_education['CollegeId'] = isset($userEducation['CollegeId'])? 
                                            $userEducation['CollegeId'] : null ; 
        $usr_education['CollegeName'] = $userEducation['CollegeName']  ;
        $usr_education['DepartmentId'] = isset($userEducation['DepartmentId'])? 
                                            $userEducation['DepartmentId'] : null ;
        $usr_education['DepartmentName'] = $userEducation['DepartmentName']; 
        $usr_education['Grade'] = $userEducation['Grade']; 
        $usr_education['EducationStageId'] = isset($userEducation['EducationStageId'])? 
                                            $userEducation['EducationStageId'] : null ; 
        $usr_education['Activities'] = isset($userEducation['Activities'])? 
                                            $userEducation['Activities'] : null ; 
        $usr_education['StartDate'] = isset($userEducation['StartDate'])? 
                                            $userEducation['StartDate'] : null ; 
        $usr_education['EndDate'] = isset($userEducation['EndDate'])? 
                                            $userEducation['EndDate'] : null ;
        $usr_education['StatusId'] = isset($userEducation['StatusId'])? 
                                            $userEducation['StatusId'] : null ; 
        
        return $usr_education ;        
      // $userEducation_array['updated_by'] = $userEducation['UpdatedBy'] ;
    }
    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function userEducationValidation(array $data)
    {
        return Validator::make($data, [
            'CollegeId' => 'sometimes|exists:colleges,id',
            'CollegeName' => 'required|min:3|max:100',
            'DepartmentId' => 'sometimes|exists:education_departments,id',
            'DepartmentName' => 'required|min:3|max:70',
            'Grade' => 'required',
            'EducationStageId' => 'sometimes|exists:education_stage,id',
            'StartDate' => 'required|date|date_format:Y-m-d|before:EndDate',
            'EndDate' => 'required|date|date_format:Y-m-d|after:StartDate',
        ]);
    }
}