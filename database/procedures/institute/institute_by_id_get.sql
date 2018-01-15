
DROP procedure IF EXISTS `institute_by_id_get`;

DELIMITER $$
CREATE PROCEDURE `institute_by_id_get`(IN `instituteId` INT)
BEGIN
      SELECT  `id` as InstituteId,`name` AS InstituteName, `admin_id` AS AdminId, `status` AS Status,
		  `state_id` AS StateId, `city_id` AS CityId ,`area_id` AS AreaId
         , `main_address` AS Address ,`type` AS Type 
      FROM institute 
      WHERE `id` = `instituteId`;
        
END$$

DELIMITER ;

