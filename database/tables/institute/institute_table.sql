
DROP TABLE IF EXISTS `institute`; 

CREATE  TABLE `institute` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `parent_institute_id` INT ,
  `admin_id` INT,
  `type` TINYINT NOT NULL,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
  `running_since` DATE ,
  `about_institute` VARCHAR(10000),  
   CONSTRAINT PK_institute PRIMARY KEY (id),
   -- CONSTRAINT FK_institute_admin_user_id FOREIGN KEY (`admin_id`) REFERENCES users(`id`),
   -- CONSTRAINT FK_institute_type FOREIGN KEY (`type`) REFERENCES institute_type(`id`),
   CONSTRAINT FK_institute_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );