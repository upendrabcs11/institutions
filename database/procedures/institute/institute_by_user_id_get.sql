
DROP procedure IF EXISTS `institute_by_user_id_get`;

DELIMITER $$
CREATE PROCEDURE `institute_by_user_id_get`(IN `adminId` INT)
BEGIN
      SELECT  `id` as InstituteId,`name` AS Name,`sort_name` AS ShortName,`full_name` AS FullName,
         `admin_id` AS AdminId, `status` AS Status,  `state_id` AS StateId, `state_name` AS StateName,
         `city_id` AS CityId ,`city_name` AS CityName, `area_id` AS AreaId, `area_name`  AS AreaName,
         `main_address` AS Address ,`type` AS InstituteType ,`running_since` AS RunningSince ,
        `about_institute` AS AboutInstitute
      FROM institute 
      WHERE `admin_id` = `adminId`;
        
END$$

DELIMITER ;