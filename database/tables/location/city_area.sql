
DROP TABLE IF EXISTS `city_areas` ; 

CREATE  TABLE `city_areas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `city_id` INT NOT NULL,
  `pin_code` VARCHAR(6)  DEFAULT '',
  `status_id` TINYINT NOT NULL DEFAULT '0',
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_city_areas PRIMARY KEY (`id`),
   CONSTRAINT FK_city_areas_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );