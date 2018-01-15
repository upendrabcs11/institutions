
DROP procedure IF EXISTS `institute_address_update`;

DELIMITER $$
CREATE PROCEDURE `institute_address_update`(
	  IN `InstituteId` INT, 
    IN `StateId` TINYINT,
	  IN `CityId` TINYINT,    
    IN `AreaId` TINYINT,
    IN `MainAddress` VARCHAR(200),
    IN `UpdatedBy` INT)
BEGIN

  SET @StateName = (SELECT `name` from state where `id` = `StateId`);
  SET @CityName = (SELECT `name` from city where `id` = `CityId`);
  SET @AreaName = (SELECT `name` from city_area where `id` = `AreaId`);

  UPDATE institute AS AI 
     JOIN (SELECT * FROM institute WHERE `id` = `InstituteId`) AS BI ON `AI.id` = `BI.id`
     SET `AI.state_id` = CASE WHEN @StateName IS NULL OR @StateName = ''  
                          THEN `BI.state_id` ELSE `StateId` END,
         `AI.state_name` = CASE WHEN @StateName IS NULL OR @StateName = ''  
                           THEN `BI.state_name` ELSE @StateName END,
         `AI.city_id` = CASE WHEN @CityName IS NULL OR @CityName = ''  
                          THEN `BI.city_id` ELSE `CityId` END,
         `AI.city_name` = CASE WHEN @CityName IS NULL OR @CityName = ''  
                           THEN `BI.city_name` ELSE @CityName END,
         `AI.area_id` = CASE WHEN @AreaName IS NULL OR @AreaName = ''  
                          THEN `BI.area_id` ELSE `AreaId` END,
         `AI.area_name` = CASE WHEN @AreaName IS NULL OR @AreaName = ''  
                           THEN `BI.area_name` ELSE @AreaName END,
         `AI.main_address` = `MainAddress`,
         `AI.last_updated_date` = now(),
         `AI.updated_by` = `UpdatedBy`
    WHERE `AI.id` = `InstituteId`;

  CALL institute_by_id_get(`InstituteId`);
    
END$$

DELIMITER ;