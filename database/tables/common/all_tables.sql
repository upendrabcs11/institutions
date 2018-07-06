USE `institutions`;
-- drop indepetable tables
SET SESSION SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- institute related
  
  DROP TABLE IF EXISTS `institute_offices`; 
  DROP TABLE IF EXISTS `institutes`; 
  DROP TABLE IF EXISTS `subjects`; 
  DROP TABLE IF EXISTS `class_batch_routines`; 
  DROP TABLE IF EXISTS `class_batchs`; 
  DROP TABLE IF EXISTS `classes_batchs_shedule`;
  DROP TABLE IF EXISTS `classes_batch_type`; 
  DROP TABLE IF EXISTS `courses`; 
  DROP TABLE IF EXISTS `education_stage`; -- master 
  DROP TABLE IF EXISTS `examination_types`;
  

  
  DROP TABLE IF EXISTS `colleges`; 
  DROP TABLE IF EXISTS `user_educations`; 
  DROP TABLE IF EXISTS `users`; 
  DROP TABLE IF EXISTS `education_departments`; 
  DROP TABLE IF EXISTS `education_degrees`; 
  DROP TABLE IF EXISTS `teaching_experiences`;


-- location tables
 DROP TABLE IF EXISTS `city_areas` ; 
 DROP TABLE IF EXISTS `cities` ; 
 DROP TABLE IF EXISTS `states` ; 
 DROP TABLE iF EXISTS `state_types` ;


-- drop dependentable table
  DROP TABLE IF EXISTS `teacher_titles`;
  DROP TABLE IF EXISTS `user_types` ; 
  DROP TABLE IF EXISTS `course_types`; 
  DROP TABLE IF EXISTS `course_groups`; 
  DROP TABLE IF EXISTS `course_levels`; 
  DROP TABLE IF EXISTS `institute_types`; 

  DROP TABLE IF EXISTS `status` ; 
-- create common tables 
-- master tables

CREATE  TABLE `status` (
  `id` SMALLINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_status PRIMARY KEY (id)  );

INSERT INTO status(`id`,`name`,`description`)
       VALUES ('0','Inactive','Inactive mean it will be not shown to end user - deactivated'),
            ('1','Active','Active or Live in System or make active by admin '),
            ('10','New','When Anonimus user inserted Records first time'),
            ('11','Pending','When Anonimus user inserted Records first time and email verified Or Verified user creates institute'),
            ('12','Verified','Verified By Web Admin When Anonimus user inserted Records first time and email verified Or Verified user creates institute');

-- insitute type

CREATE  TABLE `institute_types` (
  `id` SMALLINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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

-- user type 

CREATE  TABLE `user_types` (
  `id` SMALLINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
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


CREATE  TABLE `course_types` (
  `id` SMALLINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_types PRIMARY KEY (id),
   CONSTRAINT FK_course_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_types(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


DROP TABLE IF EXISTS `course_groups`; 
CREATE  TABLE `course_groups` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_groups PRIMARY KEY (id),
   CONSTRAINT FK_course_groups_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_groups(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


DROP TABLE IF EXISTS `course_levels`; -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on
CREATE  TABLE `course_levels` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `education_stage_id` SMALLINT,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_levels PRIMARY KEY (id),
   CONSTRAINT FK_course_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_levels(`id`,`name`,`description`,`status_id`)
       VALUES ('0','Not Specified','degree level is not defined or unknown',0),
            ('1', '11th and 12th', '11th and 12th ', 1),
            ('2', '11th, 12th and Med.', 'education from 6th to 8th', 1),
            ('3', '11th, 12th and Engg.', 'education 9th to 10th', 1),
            ('4', '11th, 12th, Med. and Engg', '11th And 12th', 1);



CREATE  TABLE `teacher_titles` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(45) ,
  `priority` SMALLINT DEFAULT 0,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_teacher_titles PRIMARY KEY (id),
   CONSTRAINT FK_teacher_titles_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO teacher_titles(`id`,`name`,`full_name`,`description`,`status_id`)
       VALUES ('0', 'Others', 'Others Custom', '', 1),
              ('1', 'Teaching Staff', 'Teaching Staff', '', 1),
              ('2', 'Sr. Teaching Staff','Senior Teaching Staff', 'Senior Level', 1),
              ('3', 'Teaching Faculty', 'Teaching Faculty', '', 1),
              ('4', 'Sr. Teaching Faculty',  'Teaching Faculty', 'Senior level', 1),

              ('5', 'H.O.D', 'Head Of Department', 'In a particular class head of department', 1),
              ('6', 'Director', 'Director', 'institute director', 1);
              

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




CREATE  TABLE `education_departments` (
  `id` SMALLINT NOT NULL  AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(45) ,
  `priority` SMALLINT DEFAULT 0,
  `education_degree_id` INT ,
  `description` VARCHAR(500),
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_departments PRIMARY KEY (id),
   CONSTRAINT FK_education_departments_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

INSERT INTO education_departments(`id`,`name`,`education_degree_id`,`status_id`)
     VALUES ('0','Others',0, 1),
          ('1', 'Computer Science', 3, 1),  
          ('2', 'Electrical Engineering', 3, 1),
          ('3', 'Mechanical Engineering', 3, 1),
          ('4', 'Civil Engineering', 3, 1),
          ('5', 'Electronics Engineering', 3, 1);


CREATE  TABLE `teaching_experiences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` VARCHAR(100)  NOT NULL,
  `user_role_id` SMALLINT , -- others in case of others custom name
  `user_role_name` VARCHAR(100) , 
  `institute_id` SMALLINT , -- others in case of others custom ins name
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(1000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experiences PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experiences_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );



















CREATE  TABLE `state_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_state_types PRIMARY KEY (`id`)
  );

INSERT INTO state_types(`id`,`name`,`status_id`)
       VALUES ('1','Normal',1),
              ('2','Indian Teritory',1);

-- non master tables
-- location table
 CREATE  TABLE `states` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `state_type_id` SMALLINT NOT NULL,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_states PRIMARY KEY (`id`),
   CONSTRAINT FK_states_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

 CREATE  TABLE `cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `state_id` INT ,
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `base_url` VARCHAR(45) ,
  `image_url` VARCHAR(45) ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_cities PRIMARY KEY (`id`),
   CONSTRAINT FK_cities_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

 CREATE  TABLE `city_areas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` SMALLINT DEFAULT 0,
  `city_id` INT NOT NULL,
  `pin_code` VARCHAR(6)  DEFAULT '',
  `status_id` SMALLINT NOT NULL DEFAULT '0',
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_city_areas PRIMARY KEY (`id`),
   CONSTRAINT FK_city_areas_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

 -- user / teachers / admins
CREATE  TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT  ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `mobile` CHAR(10) ,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) ,
  `status_id` SMALLINT NOT NULL DEFAULT 0 ,
  `user_type_id`  SMALLINT NOT NULL DEFAULT 0,
  `created_at` DATETIME  DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   CONSTRAINT PK_users_id PRIMARY KEY (id),
   CONSTRAINT FK_users_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );





-- institutions related

CREATE  TABLE `institutes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `parent_institute_id` INT ,
  `admin_id` INT,
  `institute_type_id` SMALLINT NOT NULL,
  `status_id` SMALLINT NOT NULL,
  `state_id` SMALLINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
  `running_since` DATE ,
  `about_institute` VARCHAR(10000),  
   CONSTRAINT PK_institutes PRIMARY KEY (id),
   CONSTRAINT FK_institutes_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `institute_offices` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT ,
  `admin_id` INT,
  `status_id` SMALLINT NOT NULL,
  `state_id` SMALLINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `running_since` DATE ,
  `description` VARCHAR(10000),  
   CONSTRAINT PK_institute_offices PRIMARY KEY (id),
   CONSTRAINT FK_institute_offices_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `subjects` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `priority` SMALLINT DEFAULT 0,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_subjects_name_course_level_id UNIQUE(course_level_id, name)
  );


 
DROP TABLE IF EXISTS `examination_types`; 
CREATE  TABLE `examination_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_level_id` INT, -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_examination_types PRIMARY KEY (id),
   CONSTRAINT FK_examination_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_examination_types_name_course_level_id UNIQUE(course_level_id, name)
  );

INSERT INTO examination_types(`id`,`name`,`description`,`status_id`)
       VALUES ('0','Not Specified','degree level is not defined or unknown',0),
            ('1', '11th and 12th', '11th and 12th ', 1),
            ('2', '11th, 12th and Med.', 'education from 6th to 8th', 1),
            ('3', '11th, 12th and Engg.', 'education 9th to 10th', 1),
            ('4', '11th, 12th, Med. and Engg', '11th And 12th', 1);


CREATE  TABLE `courses` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_type_id` SMALLINT , -- crash course , regular courses , advance courses 
  `course_group_id` SMALLINT, -- 11th, 12th ,11th$12th , eng. ,eng. & med. 11th,
  `course_level_id` SMALLINT, -- at what level cources is tought 10 12th iitjee 
                              -- like (not much imp nut in some cases may be used)
  `status_id` SMALLINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_courses PRIMARY KEY (id),
   CONSTRAINT FK_courses_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


DROP TABLE IF EXISTS `classes_batchs`; 
CREATE  TABLE `class_batchs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `max_capacity` INT,
  `seat_available` INT,
  `tution_fees` INT,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_level_id` SMALLINT , -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on 
  `classes_batch_type_id` SMALLINT , -- crash course , advance batch, foundation ...
  -- `class_batch_shedule_type_id` SMALLINT , -- Daily , Alternate , monthly, weekly 
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
  `classes_batchs_rating` FLOAT,
   CONSTRAINT PK_class_batchs PRIMARY KEY (id),
   CONSTRAINT FK_class_batchs_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );

 CREATE  TABLE `classes_batch_type` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_classes_batch_type PRIMARY KEY (id),
   CONSTRAINT FK_classes_batch_type FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO classes_batch_type(`id`,`name`,`status_id`)
       VALUES ('0','Others', 0),
            ('1', 'Foundation Batch',  1),
            ('2', 'Target Batch',  1),
            ('3', 'Crash Course', 1);


 -- what what day class will run
CREATE  TABLE `classes_batchs_shedule` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batch_id` INT NOT NULL,
  `classes_schedule_day_id` SMALLINT ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batchs_shedule PRIMARY KEY (id),
   CONSTRAINT FK_classes_batchs_shedule_status FOREIGN KEY (`status_id`) REFERENCES status(`id`),
   CONSTRAINT UK_classes_batchs_shedule_batch_id_day_id 
                UNIQUE(classes_batch_id, classes_schedule_day_id)
  );


DROP TABLE IF EXISTS `class_batch_routines`; 
CREATE  TABLE `class_batch_routines` (
  `id` INT NOT NULL AUTO_INCREMENT ,  
  `class_batch_id` INT NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `classes_batchs_shedule_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_routines PRIMARY KEY (id),
   CONSTRAINT FK_class_batch_routines_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );


CREATE  TABLE `user_educations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL,
  `college_id` INT, -- from where he got education
  `college_name` VARCHAR(100) , -- if id is not available just he add the name
  -- `degree_id` INT , 
  -- `degree_name` VARCHAR(100),
  `department_id` SMALLINT ,
  `department_name` VARCHAR(100) ,
  `education_stage_id` INT , -- 10th intermediate graduation post graduation
  `grade` VARCHAR(10) ,
  `activities` VARCHAR(700) ,
  `start_data` DATE ,  
  `end_data` DATE ,
  `status_id` SMALLINT NOT NULL DEFAULT 0,
  `document_url` VARCHAR(100), 
  `link_url` VARCHAR(100), 
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_user_educations PRIMARY KEY (id),
   CONSTRAINT FK_user_educations_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `colleges` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100)  NOT NULL,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(100) ,
  `priority` SMALLINT DEFAULT 0, 
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `college_type_id` SMALLINT,
  `status_id` SMALLINT NOT NULL,
  `state_id` SMALLINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
  `about_college` VARCHAR(10000),
  `college_url` VARCHAR(100),  
   CONSTRAINT PK_colleges PRIMARY KEY (id),
   CONSTRAINT FK_colleges_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `colleges` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100)  NOT NULL,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(100) ,
  `priority` SMALLINT DEFAULT 0, 
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `status_id` SMALLINT NOT NULL,
  `state_id` SMALLINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
  `about_college` VARCHAR(10000),
  `college_url` VARCHAR(100),  
   CONSTRAINT PK_colleges PRIMARY KEY (id),
   CONSTRAINT FK_colleges_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );









-- mapping table
DROP TABLE IF EXISTS `class_batch_to_examination_type`; 
CREATE  TABLE `class_batch_to_examination_type` (
  `class_batch_id` INT NOT NULL ,
  `examination_type_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_examination_type PRIMARY KEY (class_batch_id, examination_type_id)
  );


DROP TABLE IF EXISTS `class_batch_to_subjects`; 
CREATE  TABLE `class_batch_to_subjects` (
  `class_batch_id` INT NOT NULL ,
  `subject_id` INT NOT NULL ,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batch_to_subjects PRIMARY KEY (class_batch_id, subject_id)
  );








