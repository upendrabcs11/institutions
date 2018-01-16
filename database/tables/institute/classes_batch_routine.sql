
DROP TABLE IF EXISTS `classes_batch_routine`; 

CREATE  TABLE `classes_batch_routine` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batch_id` VARCHAR(100) NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batch_routine PRIMARY KEY (id)
   CONSTRAINT FK_classes_batch_routine_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );