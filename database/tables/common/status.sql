-- USE `institutions`;
DROP TABLE IF EXISTS `status` ; 

CREATE  TABLE `status` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(100),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_status PRIMARY KEY (id)  );

INSERT INTO status(`id`,`name`,`description`)
       VALUES ('0','Inactive','Inactive mean it will be not shown to end user - deactivated'),
       		  ('1','Active','Active or Live in System or make active by admin '),
       		  ('10','New','When Anonimus user inserted Records first time'),
       		  ('11','Pending','When Anonimus user inserted Records first time and email verified Or Verified user creates institute'),
       		  ('12','Verified','Verified By Web Admin When Anonimus user inserted Records first time and email verified Or Verified user creates institute');