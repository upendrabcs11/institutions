

DROP TABLE IF EXISTS `classes_schedule_day`; -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on
CREATE  TABLE `classes_schedule_day` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(45) ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_classes_schedule_day PRIMARY KEY (id),
   CONSTRAINT FK_classes_schedule_day FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO classes_schedule_day(`id`,`name`,`status_id`)
       VALUES ('0','Others', 0),
            ('1', 'MON',  1),
            ('2', 'TUE',  1),
            ('3', 'WED' 1);