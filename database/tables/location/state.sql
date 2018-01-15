
DROP TABLE IF EXISTS `state` ; 

CREATE  TABLE `state` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT '0',
  `type` TINYINT NOT NULL,
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_state PRIMARY KEY (`id`),
   CONSTRAINT UC_state_name UNIQUE (`name`),
   CONSTRAINT FK_state_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );