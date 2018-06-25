<?php

namespace App\Model\User;
use DB;

class EducationDegree 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getEducationDegree()
    {        
        $education_degree = DB::table('education_degrees as edu_deg')
        		->join('education_stage as edu_stg', 'edu_stg.id', '=', 'edu_deg.education_stage_id')
                ->select('edu_deg.id as EducationDegreeId','edu_deg.name as EducationDegreeName',
                	'edu_deg.full_name as FullName', 'edu_deg.short_name as ShortName', 
                	'edu_deg.education_stage_id as EducationStageId',
                	 'edu_stg.name as EducationStageName')
                //->where('edu_deg.status_id','=','0')
                ->orderby('edu_deg.priority')->get();
        return $education_degree;
    }
    /**
     * 
     */
    public function  getEducationDegreeFullDetails($edu_degree_id = null)
    {   

       $education_degree = DB::table('education_degrees')
                ->select('id as EducationDegreeId','name as EducationDegreeName',
                    'full_name as FullName', 'short_name as ShortName', 'education_stage_id as EducationStageId', 
                    'priority as Priority', 'status_id as StatusId', 'description as Description', 
                     'created_date as CreatedDate', 'last_updated_date as UpdatedDate', 
                     'updated_by as UpdatedBy')
                //->where('edu_deg.status_id','=','0')
                ->orderby('priority')->get();
        return $education_degree;
    }
    /**
     * 
     */
    public function  getEducationDegreeFullDetail($edu_degree_id)
    {   
          
       $education_degree = DB::table('education_degrees')
                ->select('id as EducationDegreeId','name as EducationDegreeName',
                    'full_name as FullName', 'short_name as ShortName', 'education_stage_id as EducationStageId', 
                    'priority as Priority', 'status_id as StatusId', 'description as Description', 
                     'created_date as CreatedDate', 'last_updated_date as UpdatedDate', 
                     'updated_by as UpdatedBy')
                //->where('edu_deg.status_id','=','0')
                ->where('id','=',$edu_degree_id)->get();
        return $education_degree;
    }
    /**
     * 
     */
    public function updateEducationDegree($eduDegree, $userId,$edu_degree_id){

        $edu_degree = [];
          if($eduDegree['Name'] != null)
            $edu_degree['name'] = $eduDegree['Name'] ;

          if($eduDegree['ShortName'] != null)
            $edu_degree['short_name'] = $eduDegree['ShortName'] ;

          if($eduDegree['FullName'] != null)
            $edu_degree['full_name'] = $eduDegree['FullName'] ;

          if($eduDegree['EducationStageId'] != null)
            $edu_degree['education_stage_id'] = $eduDegree['EducationStageId'] ;

          if($eduDegree['Priority'] != null)
            $edu_degree['priority'] = $eduDegree['Priority'] ;

          if($eduDegree['StatusId'] != null)
            $edu_degree['status_id'] = $eduDegree['StatusId'] ;

          if($eduDegree['Description'] != null)
            $edu_degree['description'] = $eduDegree['Description'] ;

          $edu_degree['updated_by'] = $userId;

          DB::table('education_degrees')
                ->where('id', $edu_degree_id)
                ->update($edu_degree);

          return $this->getEducationDegreeFullDetail($edu_degree_id);
    }
    /**
     * 
     */
   public function addEducationDegree($eduDegree, $userId){
     
         $edu_degree = [];
          if($eduDegree['Name'] != null)
            $edu_degree['name'] = $eduDegree['Name'] ;

          if($eduDegree['ShortName'] != null)
            $edu_degree['short_name'] = $eduDegree['ShortName'] ;

          if($eduDegree['FullName'] != null)
            $edu_degree['full_name'] = $eduDegree['FullName'] ;

          if($eduDegree['EducationStageId'] != null)
            $edu_degree['education_stage_id'] = $eduDegree['EducationStageId'] ;

          if($eduDegree['Priority'] != null)
            $edu_degree['priority'] = $eduDegree['Priority'] ;

          if($eduDegree['StatusId'] != null)
            $edu_degree['status_id'] = $eduDegree['StatusId'] ;

          if($eduDegree['Description'] != null)
            $edu_degree['description'] = $eduDegree['Description'] ;

          $edu_degree['updated_by'] = $userId;

          $edu_degree_id = DB::table('education_degrees')
                ->insertGetId($edu_degree);               

          return $this->getEducationDegreeFullDetail($edu_degree_id);

   }
}
