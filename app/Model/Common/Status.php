<?php

namespace App\Model\Common;
use DB;

class Status 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getStatus()
    {        
        $status = DB::table('status')
                ->select('id as StatusId','name as Status')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $status;
    }
    /**
     * 
     */
    public function  getStatusFullDetails()
    {        
       $status = DB::table('status')
                ->select('id as StatusId','name as Status')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $status;
    }
}
