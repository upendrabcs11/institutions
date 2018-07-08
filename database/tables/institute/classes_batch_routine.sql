DROP TABLE IF EXISTS `class_batch_routines`; 
CREATE  TABLE `class_batch_routines` (
  `id` INT NOT NULL AUTO_INCREMENT ,  
  `class_batch_id` INT NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `classes_batchs_shedule_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_routines PRIMARY KEY (id),
   CONSTRAINT FK_class_batch_routines_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );



-- DROP TABLE IF EXISTS `class_batch_routines`; 
-- CREATE  TABLE `class_batch_routines` (
--   `id` INT NOT NULL AUTO_INCREMENT ,
--   `class_batch_id` VARCHAR(100) NOT NULL ,
--   `teacher_id` INT ,
--   `subject_id` INT,
--   `start_time` TIME,
--   `end_time` TIME,
--   `status_id` SMALLINT,
--   `description` VARCHAR(500),
--   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   `updated_by` INT ,
--    CONSTRAINT PK_class_batch_routines PRIMARY KEY (id),
--    CONSTRAINT FK_class_batch_routines_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
--    );