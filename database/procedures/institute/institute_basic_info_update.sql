
DROP procedure IF EXISTS `institute_basic_info_update`;

DELIMITER $$
CREATE PROCEDURE `institute_basic_info_update`(
	  IN `InstituteId` INT, 
	  IN `InstituteName` VARCHAR(200),
    IN `InstituteShortName` VARCHAR(50),
    IN `InstituteFullName` VARCHAR(200),
    IN `InstituteParentId` INT,
    IN `InstituteTypeId` TINYINT,
    IN `InstituteRunningSince` DATE,
    IN `InstituteSummary` VARCHAR(2000),
    IN `UpdatedBy` INT)
BEGIN

  UPDATE institute AS AI 
     JOIN (SELECT * FROM institute WHERE `id` = `InstituteId`) AS BI ON `AI.id` = `BI.id`
     SET `AI.name` = CASE WHEN `InstituteName` IS NULL OR `InstituteName` = ''  
                          THEN `BI.name` ELSE `InstituteName` END,
         `AI.sort_name` = CASE WHEN `InstituteShortName` IS NULL OR `InstituteShortName`= '' 
                          THEN `BI.name` ELSE `InstituteShortName` END,
         `AI.full_name` = CASE WHEN `InstituteFullName` IS NULL OR `InstituteFullName` = '' 
                          THEN `BI.name` ELSE `InstituteFullName` END,
         `AI.parent_institute_id` = CASE WHEN `InstituteParentId` IS NULL OR `InstituteParentId` = 0  
                          THEN `BI.parent_institute_id` ELSE `InstituteParentId` END,
         `AI.type` = CASE WHEN `InstituteTypeId` IS NULL OR `InstituteTypeId` = 0  
                          THEN `BI.type` ELSE `InstituteTypeId` END,
         `AI.running_since` = CASE WHEN `InstituteRunningSince` IS NULL OR `InstituteRunningSince` = '' 
                          THEN `BI.running_since` ELSE `InstituteRunningSince` END,
         `AI.about_institute` = CASE WHEN `InstituteSummary` IS NULL OR `InstituteSummary` = ''  
                          THEN `BI.about_institute` ELSE `InstituteSummary` END,
         `AI.last_updated_date` = now(),
         `AI.updated_by` = `UpdatedBy`
    WHERE `AI.id` = `InstituteId`;

  CALL institute_by_id_get(`InstituteId`); 

END$$

DELIMITER ;