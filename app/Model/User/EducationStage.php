<?php

namespace App\Model\User;
use DB;

class EducationStage 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getEducationStage()
    {        
        $education_stage = DB::table('education_stage')
                ->select('id as EducationStageId','name as EducationStageName')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $education_stage;
    }
    /**
     * 
     */
    public function  getEducationStageFullDetails()
    {        
       $education_stage = DB::table('education_stage')
                ->select('id as EducationStageId','name as EducationStageName')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $education_stage;
    }
}
