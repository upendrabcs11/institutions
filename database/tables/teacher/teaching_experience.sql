
DROP TABLE IF EXISTS `teaching_experiences`; 

CREATE  TABLE `teaching_experiences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `teacher_id` VARCHAR(100)  NOT NULL,
  `title_id` TINYINT ,
  `title_name` VARCHAR(100) , 
  `institute_id` TINYINT ,
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(10000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experiences PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experiences_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );