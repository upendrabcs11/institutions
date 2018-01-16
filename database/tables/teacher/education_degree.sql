
DROP TABLE IF EXISTS `education_degree`; 

CREATE  TABLE `education_degree` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(100),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_education_degree PRIMARY KEY (id) ,
   CONSTRAINT UK_education_degree_name UNIQUE(name),
   CONSTRAINT FK_education_degree_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );

