

DROP TABLE IF EXISTS `education_stage`; 
CREATE  TABLE `education_stage` (
  `id` SMALLINT NOT NULL  AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45) ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_stage PRIMARY KEY (id) ,
   CONSTRAINT FK_education_stage_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO education_stage(`id`,`name`,`description`,`status_id`)
       VALUES ('0','Not Specified','degree level is not defined or unknown',0),
            ('1', 'primary Stage', 'education from 1th to 5th ', 1),
            ('2', 'Middle Stage', 'education from 6th to 8th', 1),
            ('3', 'Secondary Stage', 'education 9th to 10th', 1),
            ('4', 'Senior Secondary Stage', '11th And 12th', 1),

            ('10','Undergraduate Stage','3-4 years education 2th to 15th or 16th', 1),
            ('11','Postgraduate Stage','Master Degree', 1),
            ('12','P.H.D', 'P.H.D', 1);



-- DROP TABLE IF EXISTS `education_levels`; 
-- CREATE  TABLE `education_levels` (
--   `id` TINYINT NOT NULL  ,
--   `name` VARCHAR(45) NOT NULL ,
--   `full_name` VARCHAR(100) ,
--   `short_name` VARCHAR(45) ,
--   `status_id` TINYINT NOT NULL DEFAULT 0,
--   `description` VARCHAR(500),
--   `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   `updated_by` INT,
--    CONSTRAINT PK_education_levels PRIMARY KEY (id) ,
--    CONSTRAINT FK_education_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
--    );

-- INSERT INTO education_levels(`id`,`name`,`description`,`status_id`)
--        VALUES ('0','Not Specified','degree level is not defined or unknown',0),
--             ('1', 'primary Stage', 'education from 1th to 5th ', 0),
--             ('2', 'Middle Stage', 'education from 6th to 8th', 0),
--             ('3', 'Secondary Stage', 'education 9th to 10th', 0),
--             ('4', 'Senior Secondary Stage', '11th And 12th', 1),

--             ('10','intermediate 1','first year of intermediate schooling', 0),
--             ('11','Intermediate','first year of intermediate schooling', 1),
--             ('12','Depaloma','polytinic', 0),
            
--             ('20','Graduation','after intermideate eduaction', 1),

--             ('30','Post Graduation','after Graduation eduaction', 1);

