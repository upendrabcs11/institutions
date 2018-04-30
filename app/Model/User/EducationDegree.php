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
    public function  getEducationDegreeFullDetails()
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
}
