<?php

namespace App\BusinessLogic\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class CollegeTypeBL 
{
    public static function updateKeyMapping($collegetype)
    {
    	$CollegeType ;
    	$CollegeType['Name'] = $collegetype['Name'] ;
        $CollegeType['Priority'] = $collegetype['Priority']  ;
        $CollegeType['StatusId'] = $collegetype['StatusId']  ;
        $CollegeType['Description'] =isset($collegetype['Description'])? $collegetype['Description'] : null ; 

        return $CollegeType ;
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
            
        ]);
    }
}