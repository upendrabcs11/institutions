<?php

namespace App\Model\Location;
use DB;

class City 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCity()
    {        
         $city_detail = DB::table('cities')
                ->select('id as CityId','name as CityName',
                     'state_id as stateId' ,'base_url as base_url','image_url as image_url',
                     'status_id as StatusId', 
                     'created_date as CreatedDate', 'last_updated_date as UpdatedDate', 
                     'updated_by as UpdatedBy')
                      ->get();
        return $city_detail;

    }
//    public function updateState($statedata, $userId,$state_id){
//
//        $state_data = [];
//          if($statedata['Name'] != null)
//            $state_data['name'] = $statedata['Name'] ;
//
//          if($statedata['StatusId'] != null)
//            $state_data['status_id'] = $statedata['StatusId'] ;
//         
//          $state_data['updated_by'] = $userId;      
//           DB::table('states')
//                ->where('id', $state_id)
//                ->update($state_data);
//
//          return $this->getState();
//    }
//    
//     public function insertState($statedata){
//
//        $state_data = [];
//          if($statedata['Name'] != null)
//            $state_data['name'] = $statedata['Name'] ;
//
//          if($statedata['StatusId'] != null)
//            $state_data['status_id'] = $statedata['StatusId'];
//  
//           DB::table('states')
//                ->insert($state_data);
//
//          return $this->getState();
//    }
}
