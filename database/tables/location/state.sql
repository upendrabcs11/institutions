
DROP TABLE IF EXISTS `states` ; 

CREATE  TABLE `states` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `state_type_id` SMALLINT NOT NULL,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_states PRIMARY KEY (`id`),
   CONSTRAINT FK_states_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );
