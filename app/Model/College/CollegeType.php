<?php

namespace App\Model\College;
use DB;

class CollegeType 
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
    public function  getCollegeTypeFullDetails()
    {        
        $college_type = DB::table('college_types as clgt')
                ->leftjoin('users as usr','usr.id',"=",'clgt.updated_by')
                ->select('clgt.id as CollegeTypeId','clgt.name as CollegeTypeName','clgt.priority As Priority',
                    'clgt.status_id AS StatusId', 'clgt.description as Description',
                    'clgt.created_date','clgt.last_updated_date','usr.first_name as first_name')                
                ->get();
        return $college_type;
    }
    /**
     * 
     */
    public function updateCollegeType($college_Type, $userId,$college_type_id){

        $college_type = [];
          if($college_Type['Name'] != null)
            $college_type['name'] = $college_Type['Name'] ;

          if($college_Type['Priority'] != null)
            $college_type['priority'] = $college_Type['Priority'] ;

          if($college_Type['StatusId'] != null)
            $college_type['status_id'] = $college_Type['StatusId'] ;

          if($college_Type['Description'] != null)
            $college_type['description'] = $college_Type['Description'] ;

          $college_type['updated_by'] = $userId;

          DB::table('college_types')
                ->where('id', $college_type_id)
                ->update($college_type);

          return $this->getCollegeTypeFullDetails($college_type_id);
    }
    /**
     * 
     */
   public function addCollegeType($college_Type, $userId){
     
         $college_type = [];
          if($college_Type['Name'] != null)
            $college_type['name'] = $college_Type['Name'] ;
         
          if($college_Type['Priority'] != null)
            $college_type['priority'] = $college_Type['Priority'] ;

          if($college_Type['StatusId'] != null)
            $college_type['status_id'] = $college_Type['StatusId'] ;

          if($college_Type['Description'] != null)
            $college_type['description'] = $college_Type['Description'] ;

          $college_type['updated_by'] = $userId;

          DB::table('college_types')
                ->insert($college_type);               

          return $this->getCollegeTypeFullDetails();
   }


}
