
DROP TABLE IF EXISTS `classes_batch_type`; -- 11th and 12th eng. and medical , 11th 12th eng . and med. and so on
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