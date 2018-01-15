USE `institutions`;
-- drop indepetable tables
  -- institute related
  
  DROP TABLE IF EXISTS `institute_office`; 
  DROP TABLE IF EXISTS `institute`; 
  DROP TABLE IF EXISTS `subjects`; 
  DROP TABLE IF EXISTS `classes_batch_routine`; 
  DROP TABLE IF EXISTS `classes_batch`; 
  DROP TABLE IF EXISTS `courses`; 
  

  
  DROP TABLE IF EXISTS `college`; 
  DROP TABLE IF EXISTS `user_education`; 
  DROP TABLE IF EXISTS `users`; 
  DROP TABLE IF EXISTS `education_department`; 
  DROP TABLE IF EXISTS `education_degree`; 
  DROP TABLE IF EXISTS `teaching_experience`;


-- location tables
 DROP TABLE IF EXISTS `city_area` ; 
 DROP TABLE IF EXISTS `city` ; 
 DROP TABLE IF EXISTS `state` ; 


-- drop dependentable table
  DROP TABLE IF EXISTS `teacher_title`; 
  DROP TABLE IF EXISTS `college_type`; 
  DROP TABLE IF EXISTS `user_type` ; 
  DROP TABLE IF EXISTS `course_type`; 
  DROP TABLE IF EXISTS `course_group`; 
  DROP TABLE IF EXISTS `course_level`; 
  DROP TABLE IF EXISTS `institute_type`; 

  DROP TABLE IF EXISTS `status` ; 
-- create common tables 
-- master tables

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

-- insitute type

CREATE  TABLE `institute_type` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_institute_type PRIMARY KEY (id),
   CONSTRAINT FK_institute_type_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO institute_type(`id`,`name`,`description`)
       VALUES ('0','Not Specified','Type is not mention or unknown or other which is not listed'),
            ('1','Coaching For Engineering And Medical','IIT JEE Mains Advance ,AIPMT and other medical or engingeering entrance prepration'),
            ('101','Individual Tution','Individual Tutions Runs by a Teachers'),
            ('102','Individual Home Tution','When Teacher Goes Student house to teach them'),
            ('103','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');      

-- user type 

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


CREATE  TABLE `course_type` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_course_type PRIMARY KEY (id),
   CONSTRAINT FK_course_type_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO course_type(`id`,`name`,`description`)
       VALUES ('0','Normal','not specification'),
            ('1','Normal 1','Active or Live in System or make active by admin '),
            ('2','Normal Inserted By User','When Anonimus user inserted Records and need to verify status will be 10'),
            ('3','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');


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


CREATE  TABLE `course_level` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_course_level PRIMARY KEY (id),
   CONSTRAINT FK_course_level_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO course_level(`id`,`name`,`description`)
       VALUES ('0','Normal','not specification'),
            ('1','Normal 1','Active or Live in System or make active by admin '),
            ('2','Normal Inserted By User','When Anonimus user inserted Records and need to verify status will be 10'),
            ('3','NormalVerified By UserItself','User Insert Data and verify By Email or allready Registered User');

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


CREATE  TABLE `teacher_title` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_teacher_title PRIMARY KEY (id),
   CONSTRAINT UK_teacher_title_name UNIQUE(name),
   CONSTRAINT FK_teacher_title_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `education_degree` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(100),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_education_degree PRIMARY KEY (id) ,
   CONSTRAINT UK_education_degree_name UNIQUE(name),
   CONSTRAINT FK_education_degree_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );

CREATE  TABLE `education_department` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(100),
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
   CONSTRAINT PK_education_department PRIMARY KEY (id),
   CONSTRAINT UK_education_department_name UNIQUE(name),
   CONSTRAINT FK_education_department_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


INSERT INTO college_type(`id`,`name`,`short_name`,`department`,`description`)
       VALUES ('0','Head Of Physics Department1','HOD Of Physics','physics','dsfd'),
            ('1','Head Of Physics Department2','HOD Of Physics','physics','dsfd'),
            ('10','Head Of Physics Department3','HOD Of Physics','physics','dsfd'),
            ('11','Head Of Physics Department4','HOD Of Physics','physics','dsfd'),



CREATE  TABLE `teaching_experience` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `teacher_id` VARCHAR(100)  NOT NULL,
  `title_id` TINYINT ,
  `title_name` VARCHAR(100) , 
  `institute_id` TINYINT ,
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(10000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experience PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experience_title_id FOREIGN KEY (`title_id`) REFERENCES teacher_title(`id`),
   CONSTRAINT FK_teaching_experience_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );

























-- non master tables
-- location table
 CREATE  TABLE `state` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT '0',
  `type` TINYINT NOT NULL,
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_state PRIMARY KEY (`id`),
   CONSTRAINT UC_state_name UNIQUE (`name`),
   CONSTRAINT FK_state_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );

 CREATE  TABLE `city` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `state_id` INT ,
  `status` TINYINT NOT NULL DEFAULT '0',
  `base_url` VARCHAR(45) ,
  `image_url` VARCHAR(45) ,
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_city PRIMARY KEY (`id`),
   CONSTRAINT UC_city_name_state UNIQUE (`name`,`state_id`),
   CONSTRAINT FK_city_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );

 CREATE  TABLE `city_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `city_id` INT NOT NULL,
  `pin_code` VARCHAR(6)  DEFAULT '',
  `status` TINYINT NOT NULL DEFAULT '0',
  `created_date` DATE,
  `last_updated_date` DATE,
  `updated_by` INT,
   CONSTRAINT PK_city_area PRIMARY KEY (`id`),
   CONSTRAINT UC_city_name_cityid UNIQUE (`name`,`city_id`),
   CONSTRAINT FK_city_area_status FOREIGN KEY (`status`) REFERENCES status(`id`)
  );

 -- user / teachers / admins
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT  ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `mobile` CHAR(10) ,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) ,
  `status` TINYINT NOT NULL DEFAULT 0 ,
  `type`  TINYINT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME ,
   CONSTRAINT PK_users_id PRIMARY KEY (id),
   CONSTRAINT FK_users_status FOREIGN KEY (`status`) REFERENCES status(`id`),
   CONSTRAINT FK_users_type FOREIGN KEY (`type`) REFERENCES user_type(`id`)
  );





-- institutions related

CREATE  TABLE `institute` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `parent_institute_id` INT ,
  `admin_id` INT,
  `type` TINYINT NOT NULL,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
  `running_since` DATE ,
  `about_institute` VARCHAR(10000),  
   CONSTRAINT PK_institute PRIMARY KEY (id),
   -- CONSTRAINT FK_institute_admin_user_id FOREIGN KEY (`admin_id`) REFERENCES users(`id`),
   -- CONSTRAINT FK_institute_type FOREIGN KEY (`type`) REFERENCES institute_type(`id`),
   CONSTRAINT FK_institute_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `institute_office` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT ,
  `admin_id` INT,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `area_id` INT NOT NULL,
  `area_name` VARCHAR(100),
  `address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `running_since` DATE ,
  `description` VARCHAR(10000),  
   CONSTRAINT PK_institute_office PRIMARY KEY (id),
   -- CONSTRAINT FK_institute_office_office_admin_id FOREIGN KEY (`admin_id`) REFERENCES users(`id`),
   -- CONSTRAINT FK_institute_office_institute_id FOREIGN KEY (`institute_id`) REFERENCES institute(`id`),
   CONSTRAINT FK_institute_office_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );

CREATE  TABLE `subjects` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_id` TINYINT,
  `status` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `courses` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_type_id` TINYINT ,
  `course_group_id` TINYINT,
  `course_level_id` TINYINT,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_courses PRIMARY KEY (id),
   CONSTRAINT FK_courses_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `classes_batch` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_id` TINYINT ,
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batch PRIMARY KEY (id)
   CONSTRAINT FK_classes_batch_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `classes_batch_routine` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `classes_batch_id` VARCHAR(100) NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_classes_batch_routine PRIMARY KEY (id)
   CONSTRAINT FK_classes_batch_routine_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );


CREATE  TABLE `user_education` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL,
  `college_id` INT, -- from where he got education
  `college_name` VARCHAR(100) ,
  `degree_id` INT , 
  `degree_name` VARCHAR(100),
  `department_id` TINYINT ,
  `department_name` VARCHAR(100) ,
  `grade` VARCHAR(10) ,
  `activities` VARCHAR(700) ,
  `start_data` DATE ,  
  `end_data` DATE ,
  `status` TINYINT NOT NULL DEFAULT 0,
  `document_url` VARCHAR(100), 
  `link_url` VARCHAR(100), 
  `description` VARCHAR(500),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT ,
   CONSTRAINT PK_user_education PRIMARY KEY (id),
   CONSTRAINT FK_user_education_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );

CREATE  TABLE `college` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100)  NOT NULL,
  `full_name` VARCHAR(100) ,
  `short_name` VARCHAR(100) , 
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `type` TINYINT NOT NULL,
  `status` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
  `state_name` VARCHAR(100),
  `city_id` INT NOT NULL,
  `city_name` VARCHAR(100),
  `main_address` VARCHAR(200),
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `updated_by` INT,
  `about_college` VARCHAR(10000),
  `college_url` VARCHAR(100),  
   CONSTRAINT PK_college PRIMARY KEY (id),
   CONSTRAINT FK_college_type FOREIGN KEY (`type`) REFERENCES college_type(`id`),
   CONSTRAINT FK_college_status FOREIGN KEY (`status`) REFERENCES status(`id`)
   );





















