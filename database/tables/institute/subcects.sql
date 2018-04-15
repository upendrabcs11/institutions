
DROP TABLE IF EXISTS `subjects`; 

CREATE  TABLE `subjects` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  -- `course_id` TINYINT,
  `subject_level_id` INT,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_subjects_name_subject_level_id UNIQUE(subject_level_id, name)
   );


DROP TABLE IF EXISTS `course_to_subject`; 

CREATE  TABLE `course_to_subject` (
  `course_id` INT NOT NULL,
  `subject_id` INT NOT NULL,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_course_to_subject PRIMARY KEY (course_id, subject_id),
   CONSTRAINT FK_course_to_subject_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   );