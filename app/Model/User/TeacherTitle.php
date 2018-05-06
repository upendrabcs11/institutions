<?php

namespace App\Model\User;
use DB;

class TeacherTitle 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getTeacherTitle()
    {        
        $teacher_title = DB::table('teacher_titles')
                ->select('id as TeacherTitleId','name as TeacherTitleName',
                	'full_name as FullName')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $teacher_title;
    }
    /**
     * 
     */
    public function  getTeacherTitleFullDetails()
    {        
        $education_stage = DB::table('teacher_titles')
                ->select('id as EducationStageId','name as EducationStageName',
                	'full_name as FullName')
                //->where('edu_deg.status_id','=','0')
                //->orderby('edu_deg.priority')
                ->get();
        return $education_stage;
    }
    
}
