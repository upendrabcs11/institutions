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
<<<<<<< HEAD
                ->select('id as EducationStageId','name as EducationStageName')
=======
                ->select('id as EducationStageId','name as EducationStageName',
                	'full_name as FullName', 'short_name as ShortName')
>>>>>>> 4e39c079fb301f509b9a24d4832070b984efc4c0
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $education_stage;
    }
    /**
     * 
     */
<<<<<<< HEAD
    public function  getEducationStageFullDetails()
    {        
       $education_stage = DB::table('education_stage')
                ->select('id as EducationStageId','name as EducationStageName')
=======
    public function  getEducationDegreeFullDetails()
    {        
        $education_stage = DB::table('education_stage')
                ->select('id as EducationStageId','name as EducationStageName',
                	'full_name as FullName', 'short_name as ShortName')
>>>>>>> 4e39c079fb301f509b9a24d4832070b984efc4c0
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $education_stage;
    }
<<<<<<< HEAD
=======
    
>>>>>>> 4e39c079fb301f509b9a24d4832070b984efc4c0
}
