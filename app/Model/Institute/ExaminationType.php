<?php

namespace App\Model\Institute;
use DB;

class ExaminationType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getExaminationType()
    {        
        $examination_types = DB::table('examination_types')
                ->select('id as ExaminationTypeId','name as ExaminationTypeName',
                    'short_name as ShortName', 'full_name as FullName','course_level_id as CourseLevelId')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $examination_types;
    }
    
}
// CREATE  TABLE `examination_types` (
//   `id` INT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(100) NOT NULL ,
//   `short_name` VARCHAR(100) , 
//   `full_name` VARCHAR(100),
//   `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `description` VARCHAR(500),
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT ,
//    CONSTRAINT PK_examination_types PRIMARY KEY (id),
//    CONSTRAINT FK_examination_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
//    CONSTRAINT UK_examination_types_name_course_level_id UNIQUE(course_level_id, name)
//   );
