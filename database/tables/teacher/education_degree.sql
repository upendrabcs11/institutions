
DROP TABLE IF EXISTS `education_degrees`;
CREATE  TABLE `education_degrees` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45),
  `education_stage_id` INT,
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_degrees PRIMARY KEY (id) ,
   CONSTRAINT FK_education_degrees_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO education_degrees(`id`,`name`,`description`,`status_id`)
     VALUES ('0','Others','If not mention then take custom degree', 1),
          ('1', 'Metriculation', 'Metriculation ', 1),  
          ('2', 'Intermediate', 'Xiith degree', 1),
          ('3', 'B.Tech', 'education graduate', 1),
          ('4', 'M.Tech', 'Master Degree', 1),
          ('5','P.H.D', 'P.H.D', 1);