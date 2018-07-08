
DROP TABLE IF EXISTS `classes_batchs`; 
CREATE  TABLE `class_batchs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `max_capacity` INT,
  `seat_available` INT,
  `tution_fees` INT,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_level_id` SMALLINT , -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `classes_batch_type_id` SMALLINT , -- crash course , advance batch, foundation ...
  -- `class_batch_shedule_type_id` SMALLINT , -- Daily , Alternate , monthly, weekly 
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
  `classes_batchs_rating` FLOAT,
   CONSTRAINT PK_class_batchs PRIMARY KEY (id),
   CONSTRAINT FK_class_batchs_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );
