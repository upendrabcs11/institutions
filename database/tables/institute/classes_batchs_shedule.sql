DROP TABLE IF EXISTS `classes_batchs_shedule`; -- what what day class will run
CREATE  TABLE `classes_batchs_shedule` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batch_id` INT NOT NULL,
  `classes_schedule_day_id` SMALLINT ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batchs_shedule PRIMARY KEY (id),
   CONSTRAINT FK_classes_batchs_shedule_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_classes_batchs_shedule_batch_id_day_id 
                UNIQUE(classes_batch_id, classes_schedule_day_id)
  );