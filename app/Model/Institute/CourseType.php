<?php

namespace App\Model\Institute;
use DB;

class CourseType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCourseType()
    {        
        $course_types = DB::table('course_types')
                ->select('id as CourseId','name as CourseName')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $course_types;
    }
    
}
// CREATE  TABLE `course_types` (
//   `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(45) NOT NULL ,
//   `description` VARCHAR(500),
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT,
//    CONSTRAINT PK_course_types PRIMARY KEY (id),
//    CONSTRAINT FK_course_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
//    );
