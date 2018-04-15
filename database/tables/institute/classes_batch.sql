
DROP TABLE IF EXISTS `classes_batchs`; 

CREATE  TABLE `class_batchs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `max_capacity` INT,
  `seat_available` INT,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_id` TINYINT ,
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
  `classes_batchs_rating` FLOAT,
   CONSTRAINT PK_class_batchs PRIMARY KEY (id),
   CONSTRAINT FK_class_batchs_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );
