
DROP TABLE IF EXISTS `class_batch_to_examination_type`; 
CREATE  TABLE `class_batch_to_examination_type` (
  `class_batch_id` INT NOT NULL ,
  `examination_type_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_examination_type PRIMARY KEY (class_batch_id, examination_type_id)
  );