
DROP TABLE IF EXISTS `teaching_experiences`; 

CREATE  TABLE `teaching_experiences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` VARCHAR(100)  NOT NULL,
  `title_id` SMALLINT , -- others in case of others custom name
  `title_name` VARCHAR(100) , 
  `institute_id` SMALLINT , -- others in case of others custom ins name
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(1000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experiences PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experiences_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );