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
    public function  getCollege($searchStr)
    {   
    //echo    $searchStr; 
        $searchStr = "%{$searchStr}%";
        //echo $searchStr;
        $colleges = DB::table('colleges')
                ->select('id as CollegeId','name as CollegeName',
                    'full_name as FullName','short_name as ShortName')
                //->where('status_id','=','0')
                ->where('name', 'like', $searchStr)
                ->orwhere('full_name', 'like', $searchStr)
                ->orwhere('short_name', 'like', $searchStr)
                ->orderby('priority')
                ->get();
        return $colleges;
    }    
   
   public function  getAllCollege()
    {   
    
        $allcolleges = DB::table('colleges')
                ->get();
        return $allcolleges;
    }    


}
