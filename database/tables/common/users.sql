-- USE `institutions`;
DROP TABLE IF EXISTS `users`; 

CREATE  TABLE `users` (
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