
DROP procedure IF EXISTS `city_area_by_id_get`;

DELIMITER $$
CREATE  PROCEDURE `city_area_by_id_get`(IN `AreaId` INT)
BEGIN
	SELECT `id` AS AreaId , `name` AS AreaName,`pin_code` AS PinCode
	FROM city_area WHERE (`id` = `AreaId`)  ; 

END$$

DELIMITER ;

