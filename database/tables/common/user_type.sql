-- USE `institutions`;
DROP TABLE IF EXISTS `user_type` ; 

CREATE  TABLE `user_type` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `status` TINYINT,
  `description` VARCHAR(100),
   CONSTRAINT PK_status PRIMARY KEY (id),
   CONSTRAINT FK_user_type_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );

INSERT INTO user_type(`id`,`name`,`description`)
       VALUES ('0','normal user','Inactive mean it will be not shown to end user - deactivated'),
       		  ('1','teacher','Active or Live in System or make active by admin '),
       		  ('10','admin','When Anonimus user inserted Records and need to verify status will be 10'),
       		  ('11','super admin','User Insert Data and verify By Email or allready Registered User');