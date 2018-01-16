
DROP procedure IF EXISTS `city_area_by_city_id_get`;

DELIMITER $$
CREATE PROCEDURE `city_area_by_city_id_get`(IN `cityId` INT)
BEGIN
SELECT `id` AS AreaId , `name` AS AreaName,`pin_code` AS PinCode
FROM city_area
WHERE (`city_id` = `cityId`) AND `status` = 1 ;
END $$
DELIMITER ;
