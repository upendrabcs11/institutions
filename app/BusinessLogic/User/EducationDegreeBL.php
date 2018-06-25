<?php

namespace App\BusinessLogic\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class EducationDegreeBL 
{
    public static function updateKeyMapping($eduDegree)
    {
    	$degree ;
    	$degree['Name'] = $eduDegree['Name'] ;
        $degree['FullName'] = isset($eduDegree['FullName'])? $eduDegree['FullName'] : null ;
        $degree['ShortName'] = isset($eduDegree['ShortName'])? $eduDegree['ShortName'] : null ;
        $degree['Priority'] = $eduDegree['Priority']  ;
        $degree['StatusId'] = $eduDegree['StatusId']  ;
        $degree['EducationStageId'] = $eduDegree['EducationStageId'] ;
        $degree['Description'] =isset($eduDegree['Description'])? $eduDegree['Description'] : null ; 

        return $degree ;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'Name' => 'required|min:3|max:40',
            'Priority' => 'required|digits_between:0,100',
            'StatusId' => 'required|exists:status,id',
            'Status' => 'required|min:3|max:40',
            'EducationStageId' => 'required|exists:education_stage,id',
            'EducationStage' => 'required|min:3|max:80',
        ]);
    }
}