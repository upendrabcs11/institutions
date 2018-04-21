<?php

namespace App\Model\Institute;
use DB;

class InstituteType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getInstituteType()
    {        
        $institute_type = DB::table('institute_types')
                ->select('id as InstituteTypeId','name as InstituteTypeName','description as Description')
                ->where('status_id','=','0')->get();
        return $institute_type;
    }
    
}
