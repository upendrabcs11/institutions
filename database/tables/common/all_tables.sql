USE `institutions`;
-- drop indepetable tables
-- institute related
  
  DROP TABLE IF EXISTS `institute_offices`; 
  DROP TABLE IF EXISTS `institutes`; 
  DROP TABLE IF EXISTS `subjects`; 
  DROP TABLE IF EXISTS `class_batch_routines`; 
  DROP TABLE IF EXISTS `class_batchs`; 
  DROP TABLE IF EXISTS `courses`; 
  

  
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
  DROP TABLE IF EXISTS `college_types`; 
  DROP TABLE IF EXISTS `user_types` ; 
  DROP TABLE IF EXISTS `course_types`; 
  DROP TABLE IF EXISTS `course_groups`; 
  DROP TABLE IF EXISTS `course_levels`; 
  DROP TABLE IF EXISTS `institute_types`; 

  DROP TABLE IF EXISTS `status` ; 
-- create common tables 
-- master tables

CREATE  TABLE `status` (
  `id` TINYINT NOT NULL  ,
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
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
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
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `status_id` TINYINT,
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
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_types PRIMARY KEY (id),
   CONSTRAINT FK_course_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_types(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


CREATE  TABLE `course_groups` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_groups PRIMARY KEY (id),
   CONSTRAINT FK_course_groups_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_groups(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


CREATE  TABLE `course_levels` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_course_levels PRIMARY KEY (id),
   CONSTRAINT FK_course_levels_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO course_levels(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


CREATE  TABLE `college_types` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_college_types PRIMARY KEY (id),
   CONSTRAINT FK_college_types_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


INSERT INTO college_types(`id`,`name`,`description`)
       VALUES ('0','Not Specified','not specification');


CREATE  TABLE `teacher_titles` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `short_name` VARCHAR(45) ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_teacher_titles PRIMARY KEY (id),
   CONSTRAINT FK_teacher_titles_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `education_degrees` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_degrees PRIMARY KEY (id) ,
   CONSTRAINT FK_education_degrees_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `education_departments` (
  `id` TINYINT NOT NULL  ,
  `name` VARCHAR(45) NOT NULL ,
  `full_name` VARCHAR(100) NOT NULL ,
  `short_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(500),
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_education_departments PRIMARY KEY (id),
   CONSTRAINT FK_education_departments_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );



CREATE  TABLE `teaching_experiences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `teacher_id` VARCHAR(100)  NOT NULL,
  `title_id` TINYINT ,
  `title_name` VARCHAR(100) , 
  `institute_id` TINYINT ,
  `institute_name` VARCHAR(100) ,   
  `start_date` DATE ,  
  `end_date` DATE ,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `created_date` DATETIME ,
  `last_updated_date` DATETIME ,
  `about_experience` VARCHAR(10000),
  `document` VARCHAR(100), 
   CONSTRAINT PK_teaching_experiences PRIMARY KEY (id),
   CONSTRAINT FK_teaching_experiences_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );





















CREATE  TABLE `state_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `status_id` TINYINT NOT NULL DEFAULT '0',
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
  `status_id` TINYINT NOT NULL DEFAULT '0',
  `state_type_id` TINYINT NOT NULL,
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT,
   CONSTRAINT PK_states PRIMARY KEY (`id`),
   CONSTRAINT FK_states_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
  );

 CREATE  TABLE `cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `state_id` INT ,
  `status_id` TINYINT NOT NULL DEFAULT '0',
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
  `city_id` INT NOT NULL,
  `pin_code` VARCHAR(6)  DEFAULT '',
  `status_id` TINYINT NOT NULL DEFAULT '0',
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
  `status_id` TINYINT NOT NULL DEFAULT 0 ,
  `user_type_id`  TINYINT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME ,
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
  `institute_type_id` TINYINT NOT NULL,
  `status_id` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
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
  `status_id` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
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
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_id` TINYINT,
  `status_id` TINYINT NOT NULL DEFAULT 0,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_subjects PRIMARY KEY (id),
   CONSTRAINT FK_subjects_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `courses` (
  `id` TINYINT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `sort_name` VARCHAR(100) , 
  `full_name` VARCHAR(100),
  `course_type_id` TINYINT ,
  `course_group_id` TINYINT,
  `course_level_id` TINYINT,
  `status_id` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_courses PRIMARY KEY (id),
   CONSTRAINT FK_courses_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `class_batchs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `institute_id` INT NOT NULL , 
  `office_id` INT,
  `course_id` TINYINT ,
  `batch_start_date` DATE ,  
  `batch_end_date` DATE ,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` TINYINT NOT NULL,
  `description` VARCHAR(500),
  `created_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` INT ,
   CONSTRAINT PK_class_batchs PRIMARY KEY (id),
   CONSTRAINT FK_class_batchs_status FOREIGN KEY (`status_id`) REFERENCES status(`id`)
   );


CREATE  TABLE `class_batch_routines` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `class_batch_id` VARCHAR(100) NOT NULL ,
  `teacher_id` INT ,
  `subject_id` INT,
  `start_time` TIME,
  `end_time` TIME,
  `status_id` TINYINT NOT NULL,
  `description` VARCHAR(500),
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
  `college_name` VARCHAR(100) ,
  `degree_id` INT , 
  `degree_name` VARCHAR(100),
  `department_id` TINYINT ,
  `department_name` VARCHAR(100) ,
  `grade` VARCHAR(10) ,
  `activities` VARCHAR(700) ,
  `start_data` DATE ,  
  `end_data` DATE ,
  `status_id` TINYINT NOT NULL DEFAULT 0,
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
  `university_id`  INT, 
  `university_name`  VARCHAR(100),
  `college_type_id` TINYINT NOT NULL,
  `status_id` TINYINT NOT NULL,
  `state_id` TINYINT NOT NULL,
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





















