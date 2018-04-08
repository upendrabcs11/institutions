
DROP TABLE IF EXISTS `education_degrees`; 

CREATE  TABLE `education_degrees` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_degrees PRIMARY KEY (id) ,
   CONSTRAINT FK_education_degrees_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

