
DROP procedure IF EXISTS `city_by_id_get`;

DELIMITER $$
CREATE  PROCEDURE `city_by_id_get`(IN `CityId` INT)
BEGIN 
SELECT `id` AS CityId , `name` AS CityName , CONCAT(`base_url`,'',`image_url`)  AS ImageUrl
FROM city 
WHERE (`id` = `CityId`)  ; 
END; $$
DELIMITER ;

