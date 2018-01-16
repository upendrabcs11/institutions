
DROP TABLE IF EXISTS `city_area` ; 

CREATE  TABLE `city_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `city_id` INT NOT NULL,
  `pin_code` VARCHAR(6)  DEFAULT '',
  `status` TINYINT NOT NULL DEFAULT '0',
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_city_area PRIMARY KEY (`id`),
   CONSTRAINT UC_city_name_cityid UNIQUE (`name`,`city_id`),
   CONSTRAINT FK_city_area_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );