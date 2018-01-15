
DROP procedure IF EXISTS `institute_status_update`;

DELIMITER $$
CREATE PROCEDURE `institute_status_update`(
	  IN `InstituteId` INT, 
	  IN `StatusId` TINYINT ,
	  IN `InstituteTypeId` TINYINT,
      IN `UpdatedBy` INT)
BEGIN
  UPDATE institute AS AI 
     JOIN (SELECT * FROM institute WHERE `id` = `InstituteId`) AS BI ON `AI.id` = `BI.id`
     SET `AI.status` = CASE WHEN `StatusId` IS NULL OR `StatusId` = -1  
                          THEN `BI.status` ELSE `StatusId` END,
         `AI.type` = CASE WHEN `InstituteTypeId` IS NULL OR `InstituteTypeId`= -1 
                          THEN `BI.type` ELSE `InstituteTypeId` END,
         `AI.last_updated_date` = now(),
         `AI.updated_by` = `UpdatedBy`
    WHERE `AI.id` = `InstituteId`;

  CALL institute_by_id_get(`InstituteId`);
END$$

DELIMITER ;

