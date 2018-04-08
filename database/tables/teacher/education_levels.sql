
DROP TABLE IF EXISTS `education_levels`; 

CREATE  TABLE `education_levels` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45) ,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_levels PRIMARY KEY (id) ,
   CONSTRAINT FK_education_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO education_levels(`id`,`name`,`description`,`status_id`)
       VALUES ('0','not define','degree level is not defined or unknown',0),
            ('1','primary school','education from 1th to 5th ', 0),
            ('2','secondry schooling','education from 6th to 8th', 0),
            ('3','high schooling','education 9th to 10th', 0),
            ('4','Metriculation','10th passed student with degree', 1),

            ('10','intermediate 1','first year of intermediate schooling', 0),
            ('11','Intermediate','first year of intermediate schooling', 1),
            ('12','Depaloma','polytinic', 0),
            
            ('20','Graduation','after intermideate eduaction', 1),

            ('30','Post Graduation','after Graduation eduaction', 1);