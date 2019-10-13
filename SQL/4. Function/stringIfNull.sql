DELIMITER $$

DROP FUNCTION IF EXISTS stringIfNull$$

CREATE FUNCTION stringIfNull(p_StringToCheck varchar(5000),p_AlternateString varchar(5000))   RETURNS VARCHAR(5000) DETERMINISTIC
BEGIN

  IF( p_StringToCheck IS NULL OR TRIM(p_StringToCheck) = '' ) THEN
    RETURN p_AlternateString ;
  END IF;

  RETURN p_StringToCheck;

END$$

DELIMITER ;
-- SELECT stringIfNull('' ,'vdfvf')