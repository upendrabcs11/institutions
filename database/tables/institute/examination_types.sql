DROP TABLE IF EXISTS `examination_types`; 
CREATE  TABLE `examination_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_examination_types PRIMARY KEY (id),
   CONSTRAINT FK_examination_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_examination_types_name_course_level_id UNIQUE(course_level_id, name)
  );

INSERT INTO examination_types(`id`,`name`,`description`,`status_id`)
       VALUES ('0','Not Specified','degree level is not defined or unknown',0),
            ('1', '11th and 12th', '11th and 12th ', 1),
            ('2', '11th, 12th and Med.', 'education from 6th to 8th', 1),
            ('3', '11th, 12th and Engg.', 'education 9th to 10th', 1),
            ('4', '11th, 12th, Med. and Engg', '11th And 12th', 1);