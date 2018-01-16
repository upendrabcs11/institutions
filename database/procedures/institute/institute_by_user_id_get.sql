
DROP procedure IF EXISTS `institute_by_user_id_get`;

DELIMITER $$
CREATE PROCEDURE `institute_by_user_id_get`(IN `adminId` INT)
BEGIN
      SELECT  `ins`.`id` as InstituteId,`ins`.`name` AS Name,`ins`.`sort_name` AS ShortName,
             `ins`.`full_name` AS FullName, `ins`.`admin_id` AS AdminId, `ins`.`status` AS Status,
             `ins`.`state_id` AS StateId, `ins`.`state_name` AS StateName,`ins`.`city_id` AS CityId ,
             `ins`.`city_name` AS CityName, `ins`.`area_id` AS AreaId, `ins`.`area_name`  AS AreaName,
         `area`.`pin_code` AS PinCode ,`ins`.`main_address` AS Address ,
         `ins`.`type` AS InstituteType ,`ins`.`running_since` AS RunningSince ,
        `ins`.`about_institute` AS AboutInstitute
      FROM institute AS ins 
      JOIN city_area AS area ON ins.area_id = area.id
      WHERE `ins`.`admin_id` = `adminId`;
        
END$$

DELIMITER ;