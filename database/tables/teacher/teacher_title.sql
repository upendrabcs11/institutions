
DROP TABLE IF EXISTS `teacher_titles`; 

CREATE  TABLE `teacher_titles` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `short_name` VARCHAR(45) ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_teacher_titles PRIMARY KEY (id),
   CONSTRAINT FK_teacher_titles_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO teacher_titles(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');