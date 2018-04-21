<?php

namespace App\Model\User;
use DB;

class UserType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getUserType()
    {        
        $user_type = DB::table('user_types')
                ->select('id as UserTypeId','name as UserTypeName')
                //->where('status_id','=','0')
                ->orderby('priority')->get();
        return $user_type;
    }
    /**
     * 
     */
    public function  getUserTypeFullDetails()
    {        
        $user_type = DB::table('user_types')
                ->select('id as UserTypeId','name as UserTypeName','priority As Priority',
                    'status_id AS StatusId', 'description as Description',
                    'created_date','last_updated_date')
                ->get();
        return $user_type;
    }
    
}
