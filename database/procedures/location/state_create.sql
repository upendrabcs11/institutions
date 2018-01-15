
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

