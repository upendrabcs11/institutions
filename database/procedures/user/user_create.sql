
DROP procedure IF EXISTS `user_create`;

DELIMITER $$
CREATE PROCEDURE `user_create`(
	  IN `FirstName` VARCHAR(100), 
	  IN `LastName` VARCHAR(100),
    IN `EmailID` VARCHAR(100), 
    IN `MobileNo` VARCHAR(11),
    IN `Pwd` VARCHAR(255),
    IN `Status` TINYINT,
	  IN `UserType` TINYINT 
	)
BEGIN
      INSERT INTO users(`first_name`,`last_name`,`email`,`mobile`,`password`,`status`,`type`,`created_at`)  
             VALUES(`FirstName`,`LastName`,`EmailID`,`MobileNo`,`Pwd`,`Status`,`userType`,NOW());

      SELECT * FROM users where `id` = LAST_INSERT_ID();

END$$

DELIMITER ;

