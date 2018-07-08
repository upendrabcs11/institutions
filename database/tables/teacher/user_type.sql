-- USE `institutions`;
DROP TABLE IF EXISTS `user_types` ; 

CREATE  TABLE `user_types` (
  `id` SMALLINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_user_types PRIMARY KEY (id),
   CONSTRAINT FK_user_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

INSERT INTO user_types(`id`,`name`,`description`)
       VALUES ('0','not define','normal user whose use application '),
            ('1','teacher','teachers '),
            ('10','admin','institute admins'),
            ('20','Application Admin','application admin who manage the data and user details with
                    limited privilege');
