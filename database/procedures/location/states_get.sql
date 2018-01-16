
DROP procedure IF EXISTS `states_get`;

DELIMITER $$
CREATE  PROCEDURE `states_get`(IN `StateId` INT)
    NO SQL
SELECT `id` AS StateId , `name` AS StateName 
FROM state
WHERE (`id` = `StateId` OR `StateId` = 0 OR `StateId` IS NULL)   AND `status` = 1; $$

DELIMITER ;

