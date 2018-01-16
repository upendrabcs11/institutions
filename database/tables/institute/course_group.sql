
DROP TABLE IF EXISTS `course_group`; 

CREATE  TABLE `course_group` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_course_group PRIMARY KEY (id),
   CONSTRAINT FK_course_group_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO course_group(`id`,`name`,`description`)
       VALUES ('0','Normal','not specification'),
       		  ('1','Normal 1','Active or Live in System or make active by admin '),
       		  ('2','Normal Inserted By User','When Anonimus user inserted Records and need to verify status will be 10'),
       		  ('3','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');