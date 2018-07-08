<?php

namespace App\Model\Location;
use DB;

class State 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getState()
    {        
         $state_detail = DB::table('states')
                ->select('id as StateId','name as StateName', 
                     'status_id as StatusId', 
                     'created_date as CreatedDate', 'last_updated_date as UpdatedDate', 
                     'updated_by as UpdatedBy')
                      ->get();
        return $state_detail;

    }
    public function updateState($statedata, $userId,$state_id){

        $state_data = [];
          if($statedata['Name'] != null)
            $state_data['name'] = $statedata['Name'] ;

          if($statedata['StatusId'] != null)
            $state_data['status_id'] = $statedata['StatusId'] ;
         
          $state_data['updated_by'] = $userId;      
           DB::table('states')
                ->where('id', $state_id)
                ->update($state_data);

          return $this->getState();
    }
    
     public function insertState($statedata){

        $state_data = [];
          if($statedata['Name'] != null)
            $state_data['name'] = $statedata['Name'] ;

          if($statedata['StatusId'] != null)
            $state_data['status_id'] = $statedata['StatusId'];
  
           DB::table('states')
                ->insert($state_data);

          return $this->getState();
    }
}
