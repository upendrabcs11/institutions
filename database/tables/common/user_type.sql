-- USE `institutions`;
DROP TABLE IF EXISTS `user_types` ; 

CREATE  TABLE `user_types` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `status_id` TINYINT,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_user_types PRIMARY KEY (id),
   CONSTRAINT FK_user_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

INSERT INTO user_types(`id`,`name`,`description`)
       VALUES ('0','normal user','normal user whose use application '),
            ('1','teacher','teachers '),
            ('10','admin','institute admins'),
            ('11','super admin',' application admin');
