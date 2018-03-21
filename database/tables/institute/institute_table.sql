
DROP TABLE IF EXISTS `institutes`; 

CREATE  TABLE `institutes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `parent_institute_id` INT ,
  `admin_id` INT,
  `institute_type_id` TINYINT NOT NULL,
  `status_id` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
  `running_since` DATE ,
  `about_institute` VARCHAR(10000),  
   CONSTRAINT PK_institutes PRIMARY KEY (id),
   CONSTRAINT FK_institutes_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );