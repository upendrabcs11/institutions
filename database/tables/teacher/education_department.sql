
DROP TABLE IF EXISTS `education_department`; 

CREATE  TABLE `education_department` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_education_department PRIMARY KEY (id),
   CONSTRAINT UK_education_department_name UNIQUE(name),
   CONSTRAINT FK_education_department_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO college_type(`id`,`name`,`short_name`,`department`,`description`)
       VALUES ('0','Head Of Physics Department1','HOD Of Physics','physics','dsfd'),
       		  ('1','Head Of Physics Department2','HOD Of Physics','physics','dsfd'),
       		  ('10','Head Of Physics Department3','HOD Of Physics','physics','dsfd'),
       		  ('11','Head Of Physics Department4','HOD Of Physics','physics','dsfd'),