
DROP TABLE IF EXISTS `teacher_titles`; 
CREATE  TABLE `teacher_titles` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(45) ,
  `priority` SMALLINT DEFAULT 0,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_teacher_titles PRIMARY KEY (id),
   CONSTRAINT FK_teacher_titles_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO teacher_titles(`id`,`name`,`full_name`,`description`,`status_id`)
       VALUES ('0', 'Others', 'Others Custom', '', 1),
              ('1', 'Teaching Staff', 'Teaching Staff', '', 1),
              ('2', 'Sr. Teaching Staff','Senior Teaching Staff', 'Senior Level', 1),
              ('3', 'Teaching Faculty', 'Teaching Faculty', '', 1),
              ('4', 'Sr. Teaching Faculty',  'Teaching Faculty', 'Senior level', 1),

              ('5', 'H.O.D', 'Head Of Department', 'In a particular class head of department', 1),
              ('6', 'Director', 'Director', 'institute director', 1);