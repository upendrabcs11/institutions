
DROP TABLE IF EXISTS `institute_office`; 

CREATE  TABLE `institute_office` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT ,
  `admin_id` INT,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `running_since` DATE ,
  `description` VARCHAR(10000),  
   CONSTRAINT PK_institute_office PRIMARY KEY (id),
   -- CONSTRAINT FK_institute_office_office_admin_id FOREIGN KEY (`admin_id`) REFERENCES users(`id`),
   -- CONSTRAINT FK_institute_office_institute_id FOREIGN KEY (`institute_id`) REFERENCES institute(`id`),
   CONSTRAINT FK_institute_office_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );