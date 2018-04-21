
DROP TABLE IF EXISTS `class_batch_to_subjects`; 
CREATE  TABLE `class_batch_to_subjects` (
  `class_batch_id` INT NOT NULL ,
  `subject_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_subjects PRIMARY KEY (class_batch_id, subject_id)
  );