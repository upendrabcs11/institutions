<?php

namespace App\Model\Institute;
use DB;

class CourseGroup 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getCourseGroup()
    {        
        $course_groups = DB::table('course_groups')
                ->select('id as CourseGroupId','name as CourseGroupName')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $course_groups;
    }
    
}
// CREATE  TABLE `course_groups` (
//   `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(45) NOT NULL ,
//   `description` VARCHAR(500),
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT,
//    CONSTRAINT PK_course_groups PRIMARY KEY (id),
//    CONSTRAINT FK_course_groups_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
//    );