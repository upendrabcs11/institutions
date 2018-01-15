
DROP TABLE IF EXISTS `teaching_experience`; 

CREATE  TABLE `teaching_experience` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `teacher_id` VARCHAR(100)  NOT NULL,
  `title_id` TINYINT ,
  `title_name` VARCHAR(100) , 
  `institute_id` TINYINT ,
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(10000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experience PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experience_title_id FOREIGN KEY (`title_id`) REFERENCES teacher_title(`id`),
   CONSTRAINT FK_teaching_experience_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );