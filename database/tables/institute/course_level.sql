

DROP TABLE IF EXISTS `course_levels`; -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on
CREATE  TABLE `course_levels` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `education_stage_id` SMALLINT,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_levels PRIMARY KEY (id),
   CONSTRAINT FK_course_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_levels(`id`,`name`,`description`,`status_id`)
       VALUES ('0','Not Specified','degree level is not defined or unknown',0),
            ('1', '11th and 12th', '11th and 12th ', 1),
            ('2', '11th, 12th and Med.', 'education from 6th to 8th', 1),
            ('3', '11th, 12th and Engg.', 'education 9th to 10th', 1),
            ('4', '11th, 12th, Med. and Engg', '11th And 12th', 1);