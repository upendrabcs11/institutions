<?php

namespace App\Model\Institute;
use DB;

class ClassScheduleDay 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getClassScheduleDays()
    {        
        $classes_schedule_days = DB::table('classes_schedule_day')
                ->select('id as ClassScheduleDayId','name as ClassScheduleDayName',
                    'full_name as FullName')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $classes_schedule_days;
    }
    
}
// CREATE  TABLE `classes_schedule_day` (
//   `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(45) NOT NULL ,
//   `full_name` VARCHAR(45) ,
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT,
//    CONSTRAINT PK_classes_schedule_day PRIMARY KEY (id),
//    CONSTRAINT FK_classes_schedule_day FOREIGN KEY (`status_id`) REFERENCES status(`id`)
//    );