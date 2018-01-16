
DROP procedure IF EXISTS `institute_create`;

DELIMITER $$
CREATE PROCEDURE `institute_create`(
	  IN `Name` VARCHAR(100), 
	  IN `StateId` TINYINT,
    IN `CityId` INT, 
    IN `AreaId` INT,
    IN `Address` VARCHAR(200),
    IN `Status` TINYINT, 
    IN `InstituteType` TINYINT, 
    IN `adminId` INT)
BEGIN
  SET @StateName = (SELECT `name` from state where `id` = `StateId`);
  SET @CityName = (SELECT `name` from city where `id` = `CityId`);
  SET @AreaName = (SELECT `name` from city_area where `id` = `AreaId`);

  IF @StateName IS NOT NULL AND @CityName IS NOT NULL AND @AreaName IS NOT NULL THEN

      INSERT INTO institute(`name`,`admin_id`,`type`,`status`,`state_id`,`state_name`,`city_id`,`city_name`,
           `area_id`, `area_name`,`main_address`,`created_date`)  
             VALUES(`Name`,`adminId`,`InstituteType`,`Status`,`StateId`,@StateName,`CityId`,@CityName,
              `AreaId`,@AreaName,`Address`,NOW());

      CALL institute_by_id_get(LAST_INSERT_ID());  -- get details of last inserted city
  ELSE 
      SELECT 'Error, duplicate key occurred';
  END IF;

END $$

DELIMITER ;