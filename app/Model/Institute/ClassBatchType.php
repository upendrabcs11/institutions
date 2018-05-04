<?php

namespace App\Model\Institute;
use DB;

class ClassBatchType 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getClassBatchType()
    {        
        $classes_batch_type = DB::table('classes_batch_type')
                ->select('id as ClassBatchTypeId','name as ClassBatchTypeName')
                //->where('course_level_id','=',$courseLevelId)
                ->get();
        return $classes_batch_type;
    }
    
}
// CREATE  TABLE `classes_batch_type` (
//   `id` SMALLINT NOT NULL AUTO_INCREMENT ,
//   `name` VARCHAR(45) NOT NULL ,
//   `status_id` SMALLINT NOT NULL DEFAULT 0,
//   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
//   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_by` INT,
//    CONSTRAINT PK_classes_batch_type PRIMARY KEY (id),
//    CONSTRAINT FK_classes_batch_type FOREIGN KEY (`status_id`) REFERENCES status(`id`)
//    );