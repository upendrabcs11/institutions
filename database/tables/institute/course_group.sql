
DROP TABLE IF EXISTS `course_groups`; 

CREATE  TABLE `course_groups` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_groups PRIMARY KEY (id),
   CONSTRAINT FK_course_groups_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_groups(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');