
DROP TABLE IF EXISTS `citis` ; 

CREATE  TABLE `cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `state_id` INT ,
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `base_url` VARCHAR(45) ,
  `image_url` VARCHAR(45) ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_cities PRIMARY KEY (`id`),
   CONSTRAINT FK_cities_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );