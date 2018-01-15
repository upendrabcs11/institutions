
DROP procedure IF EXISTS `city_create`;

DELIMITER $$
CREATE PROCEDURE `city_create`(
	  IN `CityId` INT, 
	  IN `CityName` VARCHAR(50),
    IN `StateId` INT, 
    IN `Status` TINYINT, 
    IN `BaseUrl` VARCHAR(50), 
    IN `ImageUrl` VARCHAR(50), 
    IN `UpdatedBy` INT)
BEGIN
  IF `CityId` = 0 THEN -- no city is found then insert
    -- check for existing city 
    SET @cityId = 0;
    SET @cityId = (SELECT `id` FROM city 
        WHERE `state_id` = `StateId` AND UCASE(REPLACE(`name`, ' ', '')) = UCASE(REPLACE(`CityName`, ' ', '')));
    IF @cityId IS NULL OR @cityId = 0 THEN 
      INSERT INTO city(`name`,`state_id`,`status`,`base_url`,`image_url`,`created_date`, `last_updated_date`,`updated_by`)  
             VALUES(`CityName`,`StateId`,`Status`,`BaseUrl`,`ImageUrl`,NOW(),NOW(),`UpdatedBy`);

        CALL city_by_id_get(LAST_INSERT_ID()); -- get details of last inserted city
    ELSE
      CALL city_by_id_get(@cityId);
    END IF;

  ELSE -- try to upadte 
   IF EXISTS (SELECT * FROM city WHERE 'id' = 'CityId') THEN   
		UPDATE city AS Acity 
		 join (SELECT * FROM city WHERE `id` = `CityId`) AS Bcity ON `Acity.id` = `Bcity.id`
			SET `Acity.name` = CASE WHEN `CityName` IS NULL OR `CityName` = ''  THEN `Bcity.name`   ELSE `CityName` END,
    			 `Acity.state_id` = CASE WHEN `StateId` IS NULL OR `StateId` < 1  THEN `Bcity.state_id` ELSE `StateId` END,
    			 `Acity.status` = CASE WHEN `Status` IS NULL OR `Status` = 0  THEN `Bcity.status` ELSE `Status` END,
    			 `Acity.base_url` = CASE WHEN `BaseUrl` IS NULL OR `BaseUrl` = ''  THEN `Bcity.base_url` ELSE `BaseUrl` END,
    			 `Acity.image_url` = CASE WHEN `ImageUrl` IS NULL OR `ImageUrl` = ''  THEN `Bcity.image_url` ELSE `ImageUrl` END,
    			 `Acity.last_updated_date` = now(),
    			 `Acity.updated_by` = CASE WHEN `UpdatedBy` IS NULL OR `UpdatedBy` < 1 THEN `Bcity.updated_by` ELSE `UpdatedBy` END
		WHERE `Acity.id` = `CityId`;
   END IF;  
  END IF;
END$$

DELIMITER ;

