<?php

namespace App\Model\Institute;
use DB;

class CourseLevel 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCourseLevel()
    {        
        $course_levels = DB::table('course_levels')
                ->select('id as CourseLevelId','name as CourseLevelName')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $course_levels;
    }
    
}
// CREATE  TABLE `course_levels` (
//   `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(45) NOT NULL ,
//   `education_stage_id` SMALLINT,
//   `description` VARCHAR(500),
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT,
//    CONSTRAINT PK_course_levels PRIMARY KEY (id),
//    CONSTRAINT FK_course_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
//    );
