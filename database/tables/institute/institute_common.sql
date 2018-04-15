
DROP TABLE IF EXISTS `classes_batchs`; 

CREATE  TABLE `class_batchs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `max_capacity` INT,
  `seat_available` INT,
  `tution_fees` INT,
  `discount` FLOAT,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_level_id` TINYINT , -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `classes_batch_type_id` TINYINT , -- crash course , advance batch, foundation ...
  `class_batch_shedule_type` TINYINT , -- Daily , Alternate , monthly, weekly 
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

DROP TABLE IF EXISTS `classes_batchs_shedule`;
CREATE  TABLE `classes_batchs_sheduled` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batch_id` INT NOT NULL,
  `day_schedule_id` TINYINT ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batchs_shedule PRIMARY KEY (id),
   CONSTRAINT FK_classes_batchs_shedule_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_classes_batch_id_day_schedule_id UNIQUE(classes_batch_id, day_schedule_id)
  );

DROP TABLE IF EXISTS `class_batch_routines`; 
CREATE  TABLE `class_batch_routines` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batchs_shedule_id` INT NOT NULL,
  `class_batch_id` VARCHAR(100) NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` TINYINT NOT NULL,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_routines PRIMARY KEY (id),
   CONSTRAINT FK_class_batch_routines_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

DROP TABLE IF EXISTS `subjects`; 
CREATE  TABLE `subjects` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_subjects_name_subject_level_id UNIQUE(course_level_id, name)
  );

DROP TABLE IF EXISTS `examination_types`; 
CREATE  TABLE `class_and_exam_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_examination_types PRIMARY KEY (id),
   CONSTRAINT FK_examination_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_examination_types_name_course_level_id UNIQUE(course_level_id, name)
  );
 
DROP TABLE IF EXISTS `class_batch_to_examination_type`; 
CREATE  TABLE `class_batch_to_examination_type` (
  `class_batch_id` INT NOT NULL ,
  `examination_type_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_examination_type PRIMARY KEY (class_batch_id, examination_type_id)
  );

DROP TABLE IF EXISTS `class_batch_to_subjects`; 
CREATE  TABLE `class_batch_to_subjects` (
  `class_batch_id` INT NOT NULL ,
  `subject_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_examination_type PRIMARY KEY (class_batch_id, subject_id)
  );

-- DROP TABLE IF EXISTS `course_to_subject`; 
-- CREATE  TABLE `course_to_subject` (
--   `course_id` INT NOT NULL,
--   `subject_id` INT NOT NULL,
--   `status_id` TINYINT NOT NULL DEFAULT 0,
--   `description` VARCHAR(500),
--   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   `updated_by` INT ,
--    CONSTRAINT PK_course_to_subject PRIMARY KEY (course_id, subject_id),
--    CONSTRAINT FK_course_to_subject_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
--    );