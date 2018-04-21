<?php

namespace App\Model\College;
use DB;

class College 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCollegeType()
    {        
        $college_type = DB::table('college_types')
                ->select('id as CollegeTypeId','name as CollegeTypeName')
                //->where('status_id','=','0')
                ->orderby('priority')->get();
        return $college_type;
    }
    /**
     * 
     */
    public function  getUserTypeFullDetails()
    {        
        $college_type = DB::table('college_types')
                ->select('id as CollegeTypeId','name as CollegeTypeName','priority As Priority',
                    'status_id AS StatusId', 'description as Description',
                    'created_date','last_updated_date')
                ->get();
        return $college_type;
    }
}
