
DROP TABLE IF EXISTS `teacher_title`; 

CREATE  TABLE `teacher_title` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_teacher_title PRIMARY KEY (id),
   CONSTRAINT UK_teacher_title_name UNIQUE(name),
   CONSTRAINT FK_teacher_title_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );
