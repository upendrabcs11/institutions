
DROP TABLE IF EXISTS `subjects`; 

CREATE  TABLE `subjects` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_id` TINYINT,
  `status` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );