<?php

namespace App\Model\Institute;
use DB;

class Subject 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getSubjects($courseLevelId)
    {        
        $subjects = DB::table('subjects')
                ->select('id as SubjectId','name as SubjectName','sort_name as ShortName',
                    'full_name as FullName')
                ->where('course_level_id','=',$courseLevelId)
                ->get();
        return $subjects;
    }
    
}
// `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(100) NOT NULL ,
//   `sort_name` VARCHAR(100) , 
//   `full_name` VARCHAR(100),
//   `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
//   `priority` SMALLINT DEFAULT 0,
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `description` VARCHAR(500),
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT ,