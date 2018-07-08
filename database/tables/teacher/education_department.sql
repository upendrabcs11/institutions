
DROP TABLE IF EXISTS `education_departments`; 

CREATE  TABLE `education_departments` (
  `id` SMALLINT NOT NULL  AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45) ,
  `priority` SMALLINT DEFAULT 0,
  `education_degree_id` INT ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_departments PRIMARY KEY (id),
   CONSTRAINT FK_education_departments_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO education_departments(`id`,`name`,`education_degree_id`,`status_id`)
     VALUES ('0','Others',0, 1),
          ('1', 'Computer Science', 3, 1),  
          ('2', 'Electrical Engineering', 3, 1),
          ('3', 'Mechanical Engineering', 3, 1),
          ('4', 'Civil Engineering', 3, 1),
          ('5', 'Electronics Engineering', 3, 1);