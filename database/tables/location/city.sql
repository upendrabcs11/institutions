
DROP TABLE IF EXISTS `city` ; 

CREATE  TABLE `city` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `state_id` INT ,
  `status` TINYINT NOT NULL DEFAULT '0',
  `base_url` VARCHAR(45) ,
  `image_url` VARCHAR(45) ,
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_city PRIMARY KEY (`id`),
   CONSTRAINT UC_city_name_state UNIQUE (`name`,`state_id`),
   CONSTRAINT FK_city_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );