
DROP TABLE IF EXISTS `institute_offices`; 

CREATE  TABLE `institute_offices` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT ,
  `admin_id` INT,
  `status_id` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `running_since` DATE ,
  `description` VARCHAR(10000),  
   CONSTRAINT PK_institute_offices PRIMARY KEY (id),
   CONSTRAINT FK_institute_offices_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );
