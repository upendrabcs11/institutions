<?php

namespace App\Model\College;
use DB;

class College 
{

    /**
     * get filered college name and id
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCollege($req)
    {          
        $query = DB::table('colleges')
                ->select('id as CollegeId','name as CollegeName',
                    'full_name as FullName','short_name as ShortName');

        if(isset($req['status']))
              $query = $query->where('status_id','=',$req['status']) ;

        if(isset($req['name'])){
              $searchStr = "%{$req['name']}%";
              $query = $query->whereRaw("(name like '".$searchStr."' or full_name like '".
                              $searchStr."' or short_name like '".$searchStr."')");
               }

        if(isset($req['stateid']))
              $query = $query->where('state_id','=',$req['stateid']) ;

        if(isset($req['cityid']))
              $query = $query->where('city_id','=',$req['cityid']) ;

         $colleges = $query->get();

        return $colleges;
    }    
   
   public function  getAllCollege()
    {   
    
        $allcolleges = DB::table('colleges')
                ->get();
        return $allcolleges;
    }    


}
