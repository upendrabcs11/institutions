
DROP TABLE IF EXISTS `colleges`; 
CREATE  TABLE `colleges` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100)  NOT NULL,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(100) ,
  `priority` SMALLINT DEFAULT 0, 
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `college_type_id` SMALLINT,
  `status_id` SMALLINT NOT NULL,
  `state_id` SMALLINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
  `about_college` VARCHAR(10000),
  `college_url` VARCHAR(100),  
   CONSTRAINT PK_colleges PRIMARY KEY (id),
   CONSTRAINT FK_colleges_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );
