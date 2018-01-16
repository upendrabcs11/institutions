
DROP TABLE IF EXISTS `college`; 

CREATE  TABLE `college` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100)  NOT NULL,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(100) , 
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `type` TINYINT NOT NULL,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
  `about_college` VARCHAR(10000),
  `college_url` VARCHAR(100),  
   CONSTRAINT PK_college PRIMARY KEY (id),
   CONSTRAINT FK_college_type FOREIGN KEY (`type`) REFERENCES college_type(`id`),
   CONSTRAINT FK_college_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );