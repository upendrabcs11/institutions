
DROP TABLE IF EXISTS `course_types`; 

CREATE  TABLE `course_types` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_types PRIMARY KEY (id),
   CONSTRAINT FK_course_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_types(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification'),
            ('1','Foundation','not specification'),
            ('2','Crash Course','not specification')      ;