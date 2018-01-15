
DROP TABLE IF EXISTS `college_type`; 

CREATE  TABLE `college_type` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_college_type PRIMARY KEY (id),
   CONSTRAINT UK_college_type_name UNIQUE(name),
   CONSTRAINT FK_college_type_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO college_type(`id`,`name`,`description`)
       VALUES ('0','deemed university','Inactive mean it will be not shown to end user - deactivated'),
       		  ('1','Open University','Active or Live in System or make active by admin '),
       		  ('10','Normal Inserted By User','When Anonimus user inserted Records and need to verify status will be 10'),
       		  ('11','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');