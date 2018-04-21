
DROP TABLE IF EXISTS `institute_types`; 
CREATE  TABLE `institute_types`(
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_institute_types PRIMARY KEY (id),
   CONSTRAINT FK_institute_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO institute_types(`id`,`name`,`description`)
       VALUES ('0','Not Specified','Type is not mention or unknown or other which is not listed'),
            ('1','Coaching For Engineering And Medical','IIT JEE Mains Advance ,AIPMT and other medical or engingeering entrance prepration'),
       		  ('101','Individual Tution','Individual Tutions Runs by a Teachers'),
       		  ('102','Individual Home Tution','When Teacher Goes Student house to teach them'),
       		  ('103','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');