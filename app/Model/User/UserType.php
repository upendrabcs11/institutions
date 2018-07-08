<?php

namespace App\Model\User;
use App\Common\Enum ;
use DB;

class UserType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getUserType($req)
    {     
        $query = DB::table('user_types')
                ->select('id as UserTypeId','name as UserTypeName');
        if(isset($req['status']))
              $query = $query->where('status_id','=',$req['status']) ;
        
        $user_type = $query->orderby('priority')->get();

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
