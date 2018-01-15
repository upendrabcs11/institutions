
DROP TABLE IF EXISTS `user_education`; 

CREATE  TABLE `user_education` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL,
  `college_id` INT, -- from where he got education
  `college_name` VARCHAR(100) ,
  `degree_id` INT , 
  `degree_name` VARCHAR(100),
  `department_id` TINYINT ,
  `department_name` VARCHAR(100) ,
  `grade` VARCHAR(10) ,
  `activities` VARCHAR(700) ,
  `start_data` DATE ,  
  `end_data` DATE ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `document_url` VARCHAR(100), 
  `link_url` VARCHAR(100), 
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_user_education PRIMARY KEY (id),
   CONSTRAINT FK_user_education_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );