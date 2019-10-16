DROP procedure IF EXISTS `USP_userLogin`;
DELIMITER $$
CREATE PROCEDURE `USP_userLogin` ( IN p_op_Username VARCHAR(255),IN p_Password VARCHAR(255) ,IN p_Source VARCHAR(255),IN p_Language VARCHAR(255))
proc_Call:BEGIN
  DECLARE RowCount INT DEFAULT 0;
  DECLARE ErrorNumber INT;
  DECLARE ErrorMessage VARCHAR(1000);
  
  DECLARE op_UserEmail VARCHAR(225);
  DECLARE op_UserPhoneNumber VARCHAR(10);
  DECLARE op_Username VARCHAR(225);

  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00000' AND `language` = p_Language;
      ROLLBACK;
    END;

  -- Language check block : START
  IF ( stringIsNull(p_Language)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00012' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS (select 1 from languageLookup where language = p_Language) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00009' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  END IF;
  -- Language check block : END
  
  -- Input check block : START
  IF(stringIsNull(p_op_Username)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00010' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Source)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00022' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Password)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00011' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS(  SELECT 1 FROM lookUp WHERE name = p_Source AND category = 'source' AND languageID = getLanguageID(p_Language)  ) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail,op_UserPhoneNumber,op_Username  FROM `MessageMaster`  WHERE `Code` = 'ERR00033' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;
	-- Input check block : END
    
    
  -- Credentials validation block : START

  IF EXISTS(SELECT 1 FROM `userInformation` WHERE ( emailID = p_op_Username OR phoneNumber = p_op_Username OR username = p_op_Username ) AND isLock = 1) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00071' AND `language` = p_Language;
    LEAVE proc_Call;   
  END;
  END IF;

  SELECT phoneNumber,emailID,username INTO op_UserPhoneNumber,op_UserEmail,op_Username FROM `userInformation` WHERE ( emailID = p_op_Username OR phoneNumber = p_op_Username OR username = p_op_Username ) AND isLock = 0;

  IF(stringIsNull(op_UserEmail)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00008' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;


  SET RowCount = ( SELECT 1 FROM `userInformation` WHERE emailID = op_UserEmail AND password = AES_ENCRYPT(p_Password,op_UserEmail) );
  
  IF(RowCount > 0 ) THEN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00006' AND `language` = p_Language;
  ELSE
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `MessageMaster` WHERE `Code` = 'ERR00008' AND `language` = p_Language;
  END IF;
  -- Credentials validation block : END
END$$

DELIMITER ;

/*
call USP_userLogin('superUser','Test123!','Web','English');
*/