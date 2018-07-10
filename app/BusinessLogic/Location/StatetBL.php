<?php

namespace App\BusinessLogic\Location;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class StateBL 
{
    public static function updateKeyMapping($state)
    {
    	$state_data ;
    	$state_data['Name'] = $state['Name'] ;
        $state_data['StatusId'] = $state['StatusId']  ;
              
        return $state_data ;
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
            'StatusId' => 'required|exists:status,id',
            'Status' => 'required|min:3|max:40',
                    ]);
    }
}