
DROP TABLE IF EXISTS `classes_batch`; 

CREATE  TABLE `classes_batch` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_id` TINYINT ,
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batch PRIMARY KEY (id)
   CONSTRAINT FK_classes_batch_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );