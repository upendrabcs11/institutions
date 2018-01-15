
DROP procedure IF EXISTS `city_by_state_id_get`;

DELIMITER $$

CREATE  PROCEDURE `city_by_state_id_get`(IN `StateId` INT)
BEGIN
	SELECT `id` AS CityId , `name` AS CityName , CONCAT(`base_url`,'',`image_url`)  AS ImageUrl
	FROM city 
	WHERE (`state_id` = `StateId`)   AND `status` = 1 ; 
END; $$
DELIMITER ;

