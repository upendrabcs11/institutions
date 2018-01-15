
DROP TABLE IF EXISTS `courses`; 

CREATE  TABLE `courses` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_type_id` TINYINT ,
  `course_group_id` TINYINT,
  `course_level_id` TINYINT,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_courses PRIMARY KEY (id),
   CONSTRAINT FK_courses_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );