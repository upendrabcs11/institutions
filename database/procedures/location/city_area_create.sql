
DROP procedure IF EXISTS `city_area_create`;

DELIMITER $$
CREATE PROCEDURE `city_area_create`(
	IN `AreaId` INT, 
	IN `AreaName` VARCHAR(50), 
	IN `CityId` INT, 
	IN `PinCode` CHAR(6), 
	IN `Status` TINYINT, 
	IN `UpdatedBy` INT)
BEGIN
	IF `AreaId` = 0 THEN -- insert
	-- check for existing area 
    SET @areaId = 0;
    SET @areaId = (SELECT `id` FROM city_area 
        WHERE `city_id` = `CityId` AND UCASE(REPLACE(`name`,' ','')) = UCASE(REPLACE(`AreaName`,' ','')));
    IF @areaId IS NULL OR @areaId = 0 THEN 
      INSERT INTO  city_area(`name`,`city_id`,`pin_code`,`status`,`created_date`, `last_updated_date`,`updated_by`)  
           VALUES(`AreaName`,`CityId`,`PinCode`,`Status`,NOW(),NOW(),`UpdatedBy`);

     CALL city_area_by_id_get(LAST_INSERT_ID()); -- get details of last inserted areaId 	
    ELSE
      CALL city_area_by_id_get(@areaId);
    END IF;
       
  ELSE  -- update
   IF EXISTS (SELECT * FROM city_area WHERE `id` = `AreaId`) THEN   
		UPDATE city_area AS Aarea join (SELECT * FROM city_area WHERE `id` = `AreaId`) AS Barea  ON `Aarea.id` = `Barea.id`
			SET `Aarea.name` = CASE WHEN `AreaName` IS NULL OR `AreaName` = ''  THEN `Barea.name`   ELSE `AreaName` END,
			    `Aarea.city_id` = CASE WHEN `CityId` IS NULL OR `CityId` < 1    THEN `Barea.city_id` ELSE `CityId` END,
			    `Aarea.pin_code` = CASE WHEN `PinCode` IS NULL OR `PinCode` = ''  THEN `Barea.pin_code` ELSE `PinCode` END,
			 	`Aarea.status` = CASE WHEN `Status` IS NULL OR `Status` < 0  THEN `Barea.status` ELSE `Status` END,
			 	`Aarea.last_updated_date` = now(),
			 	`Aarea.updated_by` = CASE WHEN `UpdatedBy` IS NULL OR `UpdatedBy` < 1  THEN `Barea.updated_by` ELSE `UpdatedBy` END
		WHERE `Aarea.id` = `AreaId`;
   END IF;  
  END IF;
END$$

DELIMITER ;

