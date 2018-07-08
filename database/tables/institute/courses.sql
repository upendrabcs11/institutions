
DROP TABLE IF EXISTS `courses`; 
CREATE  TABLE `courses` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_type_id` SMALLINT , -- crash course , regular courses , advance courses 
  `course_group_id` SMALLINT, -- 11th, 12th ,11th$12th , eng. ,eng. & med. 11th,
  `course_level_id` SMALLINT, -- at what level cources is tought 10 12th iitjee 
                              -- like (not much imp nut in some cases may be used)
  `status_id` SMALLINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_courses PRIMARY KEY (id),
   CONSTRAINT FK_courses_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );