
DROP procedure IF EXISTS `institute_address_update`;

DELIMITER $$
CREATE PROCEDURE `institute_address_update`(
	  IN `InstituteId` INT, 
    IN `StateId` TINYINT,
	  IN `CityId` TINYINT,    
    IN `AreaId` TINYINT,
    IN `MainAddress` VARCHAR(200),
    IN `UpdatedBy` INT)
BEGIN

  SET @StateName = (SELECT `name` from state where `id` = `StateId`);
  SET @CityName = (SELECT `name` from city where `id` = `CityId`);
  SET @AreaName = (SELECT `name` from city_area where `id` = `AreaId`);

  UPDATE institute AS AI 
     JOIN (SELECT * FROM institute WHERE `id` = `InstituteId`) AS BI ON `AI.id` = `BI.id`
     SET `AI.state_id` = CASE WHEN @StateName IS NULL OR @StateName = ''  
                          THEN `BI.state_id` ELSE `StateId` END,
         `AI.state_name` = CASE WHEN @StateName IS NULL OR @StateName = ''  
                           THEN `BI.state_name` ELSE @StateName END,
         `AI.city_id` = CASE WHEN @CityName IS NULL OR @CityName = ''  
                          THEN `BI.city_id` ELSE `CityId` END,
         `AI.city_name` = CASE WHEN @CityName IS NULL OR @CityName = ''  
                           THEN `BI.city_name` ELSE @CityName END,
         `AI.area_id` = CASE WHEN @AreaName IS NULL OR @AreaName = ''  
                          THEN `BI.area_id` ELSE `AreaId` END,
         `AI.area_name` = CASE WHEN @AreaName IS NULL OR @AreaName = ''  
                           THEN `BI.area_name` ELSE @AreaName END,
         `AI.main_address` = `MainAddress`,
         `AI.last_updated_date` = now(),
         `AI.updated_by` = `UpdatedBy`
    WHERE `AI.id` = `InstituteId`;

  CALL institute_by_id_get(`InstituteId`);
    
END$$

DELIMITER ;






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







DROP procedure IF EXISTS `institute_by_id_get`;

DELIMITER $$
CREATE PROCEDURE `institute_by_id_get`(IN `instituteId` INT)
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
      WHERE `ins`.`id` = `instituteId`;
        
END$$

DELIMITER ;





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





DROP procedure IF EXISTS `institute_create`;

DELIMITER $$
CREATE PROCEDURE `institute_create`(
	  IN `Name` VARCHAR(100), 
	  IN `StateId` TINYINT,
    IN `CityId` INT, 
    IN `AreaId` INT,
    IN `Address` VARCHAR(200),
    IN `Status` TINYINT, 
    IN `InstituteType` TINYINT, 
    IN `adminId` INT)
BEGIN
  SET @StateName = (SELECT `name` from state where `id` = `StateId`);
  SET @CityName = (SELECT `name` from city where `id` = `CityId`);
  SET @AreaName = (SELECT `name` from city_area where `id` = `AreaId`);

  IF @StateName IS NOT NULL AND @CityName IS NOT NULL AND @AreaName IS NOT NULL THEN

      INSERT INTO institute(`name`,`admin_id`,`type`,`status`,`state_id`,`state_name`,`city_id`,`city_name`,
           `area_id`, `area_name`,`main_address`,`created_date`)  
             VALUES(`Name`,`adminId`,`InstituteType`,`Status`,`StateId`,@StateName,`CityId`,@CityName,
              `AreaId`,@AreaName,`Address`,NOW());

      CALL institute_by_id_get(LAST_INSERT_ID());  -- get details of last inserted city
  ELSE 
      SELECT 'Error, duplicate key occurred';
  END IF;

END $$

DELIMITER ;







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




DROP procedure IF EXISTS `city_area_by_city_id_get`;

DELIMITER $$
CREATE PROCEDURE `city_area_by_city_id_get`(IN `cityId` INT)
BEGIN
SELECT `id` AS AreaId , `name` AS AreaName,`pin_code` AS PinCode
FROM city_area
WHERE (`city_id` = `cityId`) AND `status` = 1 ;
END $$
DELIMITER ;






DROP procedure IF EXISTS `city_area_by_id_get`;

DELIMITER $$
CREATE  PROCEDURE `city_area_by_id_get`(IN `AreaId` INT)
BEGIN
	SELECT `id` AS AreaId , `name` AS AreaName,`pin_code` AS PinCode
	FROM city_area WHERE (`id` = `AreaId`)  ; 

END$$

DELIMITER ;





DROP procedure IF EXISTS `city_area_create`;

DELIMITER $$
CREATE PROCEDURE `city_area_create`(
	IN `AreaId` INT, 
	IN `AreaName` VARCHAR(50), 
	IN `CityId` INT, 
	IN `PinCode` CHAR(6), 
	IN `Status` TINYINT, 
	IN `UpdatedBy` INT)
BEGIN
	IF `AreaId` = 0 THEN -- insert
	-- check for existing area 
    SET @areaId = 0;
    SET @areaId = (SELECT `id` FROM city_area 
        WHERE `city_id` = `CityId` AND UCASE(REPLACE(`name`,' ','')) = UCASE(REPLACE(`AreaName`,' ','')));
    IF @areaId IS NULL OR @areaId = 0 THEN 
      INSERT INTO  city_area(`name`,`city_id`,`pin_code`,`status`,`created_date`, `last_updated_date`,`updated_by`)  
           VALUES(`AreaName`,`CityId`,`PinCode`,`Status`,NOW(),NOW(),`UpdatedBy`);

     CALL city_area_by_id_get(LAST_INSERT_ID()); -- get details of last inserted areaId 	
    ELSE
      CALL city_area_by_id_get(@areaId);
    END IF;
       
  ELSE  -- update
   IF EXISTS (SELECT * FROM city_area WHERE `id` = `AreaId`) THEN   
		UPDATE city_area AS Aarea join (SELECT * FROM city_area WHERE `id` = `AreaId`) AS Barea  ON `Aarea.id` = `Barea.id`
			SET `Aarea.name` = CASE WHEN `AreaName` IS NULL OR `AreaName` = ''  THEN `Barea.name`   ELSE `AreaName` END,
			    `Aarea.city_id` = CASE WHEN `CityId` IS NULL OR `CityId` < 1    THEN `Barea.city_id` ELSE `CityId` END,
			    `Aarea.pin_code` = CASE WHEN `PinCode` IS NULL OR `PinCode` = ''  THEN `Barea.pin_code` ELSE `PinCode` END,
			 	`Aarea.status` = CASE WHEN `Status` IS NULL OR `Status` < 0  THEN `Barea.status` ELSE `Status` END,
			 	`Aarea.last_updated_date` = now(),
			 	`Aarea.updated_by` = CASE WHEN `UpdatedBy` IS NULL OR `UpdatedBy` < 1  THEN `Barea.updated_by` ELSE `UpdatedBy` END
		WHERE `Aarea.id` = `AreaId`;
   END IF;  
  END IF;
END$$

DELIMITER ;





DROP procedure IF EXISTS `city_by_id_get`;

DELIMITER $$
CREATE  PROCEDURE `city_by_id_get`(IN `CityId` INT)
BEGIN 
SELECT `id` AS CityId , `name` AS CityName , CONCAT(`base_url`,'',`image_url`)  AS ImageUrl
FROM city 
WHERE (`id` = `CityId`)  ; 
END; $$
DELIMITER ;






DROP procedure IF EXISTS `city_by_state_id_get`;

DELIMITER $$

CREATE  PROCEDURE `city_by_state_id_get`(IN `StateId` INT)
BEGIN
	SELECT `id` AS CityId , `name` AS CityName , CONCAT(`base_url`,'',`image_url`)  AS ImageUrl
	FROM city 
	WHERE (`state_id` = `StateId`)   AND `status` = 1 ; 
END; $$
DELIMITER ;






DROP procedure IF EXISTS `city_create`;

DELIMITER $$
CREATE PROCEDURE `city_create`(
	  IN `CityId` INT, 
	  IN `CityName` VARCHAR(50),
    IN `StateId` INT, 
    IN `Status` TINYINT, 
    IN `BaseUrl` VARCHAR(50), 
    IN `ImageUrl` VARCHAR(50), 
    IN `UpdatedBy` INT)
BEGIN
  IF `CityId` = 0 THEN -- no city is found then insert
    -- check for existing city 
    SET @cityId = 0;
    SET @cityId = (SELECT `id` FROM city 
        WHERE `state_id` = `StateId` AND UCASE(REPLACE(`name`, ' ', '')) = UCASE(REPLACE(`CityName`, ' ', '')));
    IF @cityId IS NULL OR @cityId = 0 THEN 
      INSERT INTO city(`name`,`state_id`,`status`,`base_url`,`image_url`,`created_date`, `last_updated_date`,`updated_by`)  
             VALUES(`CityName`,`StateId`,`Status`,`BaseUrl`,`ImageUrl`,NOW(),NOW(),`UpdatedBy`);

        CALL city_by_id_get(LAST_INSERT_ID()); -- get details of last inserted city
    ELSE
      CALL city_by_id_get(@cityId);
    END IF;

  ELSE -- try to upadte 
   IF EXISTS (SELECT * FROM city WHERE 'id' = 'CityId') THEN   
		UPDATE city AS Acity 
		 join (SELECT * FROM city WHERE `id` = `CityId`) AS Bcity ON `Acity.id` = `Bcity.id`
			SET `Acity.name` = CASE WHEN `CityName` IS NULL OR `CityName` = ''  THEN `Bcity.name`   ELSE `CityName` END,
    			 `Acity.state_id` = CASE WHEN `StateId` IS NULL OR `StateId` < 1  THEN `Bcity.state_id` ELSE `StateId` END,
    			 `Acity.status` = CASE WHEN `Status` IS NULL OR `Status` = 0  THEN `Bcity.status` ELSE `Status` END,
    			 `Acity.base_url` = CASE WHEN `BaseUrl` IS NULL OR `BaseUrl` = ''  THEN `Bcity.base_url` ELSE `BaseUrl` END,
    			 `Acity.image_url` = CASE WHEN `ImageUrl` IS NULL OR `ImageUrl` = ''  THEN `Bcity.image_url` ELSE `ImageUrl` END,
    			 `Acity.last_updated_date` = now(),
    			 `Acity.updated_by` = CASE WHEN `UpdatedBy` IS NULL OR `UpdatedBy` < 1 THEN `Bcity.updated_by` ELSE `UpdatedBy` END
		WHERE `Acity.id` = `CityId`;
   END IF;  
  END IF;
END$$

DELIMITER ;





DROP procedure IF EXISTS `state_create`;

DELIMITER $$
CREATE PROCEDURE `state_create`(
	  IN `StateId` INT, 
	  IN `StateName` VARCHAR(50),
    IN `StateType` INT, 
    IN `Status` TINYINT, 
    IN `UpdatedBy` INT)
BEGIN
  IF `StateId` = 0 THEN -- no state is found then insert
  -- check for existing state 
    SET @stateId = 0;
    SET @stateId = (SELECT `id` FROM state WHERE UCASE(REPLACE(`name`, ' ', '')) = UCASE(REPLACE(`StateName`, ' ', '')));
    IF @stateId IS NULL OR @stateId = 0 THEN 
      INSERT INTO  state(`name`,`type`,`status`,`created_date`, `last_updated_date`,`updated_by`)  
           VALUES(`StateName`,`StateType`,`Status`,NOW(),NOW(),`UpdatedBy`);

      CALL states_get(LAST_INSERT_ID()); -- get details of last inserted state  
    ELSE
      CALL states_get(@stateId);
    END IF;      

  ELSE -- try to upadte 
   IF EXISTS (SELECT * FROM state WHERE 'id' = 'StateId') THEN   
		UPDATE state AS Astate 
		 join (SELECT * FROM state WHERE `id` = `StateId`) AS Bstate ON `Astate.id` = `Bstate.id`
			SET `Astate.name` = CASE WHEN `StateName` IS NULL OR `StateName` = ''  THEN `Bstate.name`   ELSE `StateName` END,
    			 `Astate.type` = CASE WHEN `StateType` IS NULL OR `StateType` = 0  THEN `Bstate.type` ELSE `StateType` END,
    			 `Astate.status` = CASE WHEN `Status` IS NULL OR `Status` < 0  THEN `Bstate.status` ELSE `Status` END,
    			 `Astate.last_updated_date` = now(),
    			 `Astate.updated_by` = CASE WHEN `UpdatedBy` IS NULL OR `UpdatedBy` < 1 THEN `Bstate.updated_by` ELSE `UpdatedBy` END
		WHERE `Astate.id` = `StateId`;
   END IF;  
  END IF;
END$$

DELIMITER ;






DROP procedure IF EXISTS `states_get`;

DELIMITER $$
CREATE  PROCEDURE `states_get`(IN `StateId` INT)
    NO SQL
SELECT `id` AS StateId , `name` AS StateName 
FROM state
WHERE (`id` = `StateId` OR `StateId` = 0 OR `StateId` IS NULL)   AND `status` = 1; $$

DELIMITER ;





DROP procedure IF EXISTS `user_create`;

DELIMITER $$
CREATE PROCEDURE `user_create`(
	  IN `FirstName` VARCHAR(100), 
	  IN `LastName` VARCHAR(100),
    IN `EmailID` VARCHAR(100), 
    IN `MobileNo` VARCHAR(11),
    IN `Pwd` VARCHAR(255),
    IN `Status` TINYINT,
	  IN `UserType` TINYINT 
	)
BEGIN
      INSERT INTO users(`first_name`,`last_name`,`email`,`mobile`,`password`,`status`,`type`,`created_at`)  
             VALUES(`FirstName`,`LastName`,`EmailID`,`MobileNo`,`Pwd`,`Status`,`userType`,NOW());

      SELECT * FROM users where `id` = LAST_INSERT_ID();

END$$

DELIMITER ;
























