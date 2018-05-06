
DROP TABLE IF EXISTS `user_educations`; 

CREATE  TABLE `user_educations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL,
  `college_id` INT, -- from where he got education
  `college_name` VARCHAR(100) , -- if id is not available just he add the name
  -- `degree_id` INT , 
  -- `degree_name` VARCHAR(100),
  `department_id` SMALLINT ,
  `department_name` VARCHAR(100) ,
  `education_stage_id` INT , -- 10th intermediate graduation post graduation
  `grade` VARCHAR(10) ,
  `activities` VARCHAR(700) ,
  `start_date` DATE ,  
  `end_date` DATE ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `document_url` VARCHAR(100), 
  `link_url` VARCHAR(100), 
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_user_educations PRIMARY KEY (id),
   CONSTRAINT FK_user_educations_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );
