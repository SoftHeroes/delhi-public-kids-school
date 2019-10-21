-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 06:06 PM
-- Server version: 10.2.27-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wgotanfi_dpks`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`wgotanfi`@`localhost` PROCEDURE `USP_createUser` (IN `p_Password` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_ConfirmPassword` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_FirstName` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_MiddleName` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_LastName` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_EmailID` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_PhoneNumber` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_Username` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_UserPolicyID` INT COLLATE utf8_unicode_ci, IN `p_Language` VARCHAR(255) COLLATE utf8_unicode_ci, IN `p_Source` VARCHAR(255) COLLATE utf8_unicode_ci)  proc_Call:BEGIN
	DECLARE RowCount INT DEFAULT 0;
  DECLARE ErrorNumber INT;
  DECLARE ErrorLine INT;
  DECLARE ErrorMessage VARCHAR(1000);
  DECLARE op_UUID VARCHAR(64);
      
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00000' AND `language` = p_Language;
      ROLLBACK;
    END;


  -- Language check block : START
  IF (stringIsNull(p_Language)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00012' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS (select 1 from languageLookup where language = p_Language) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00009' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  END IF;
  -- Language check block : END
	
  -- Input check block : START
  IF(stringIsNull(p_Password)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00011' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_ConfirmPassword)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00017' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_FirstName)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00015' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_LastName)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00016' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_EmailID)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00018' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_PhoneNumber)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00019' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_userPolicyID)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00005' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF(stringIsNull(p_Username)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE Code = 'ERR00044' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (STRCMP( p_Password,p_ConfirmPassword )) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00013' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF( isPassword(p_Password) != 0 ) THEN
  BEGIN
      
    DECLARE  passwordReason tinyint(4);
    SET passwordReason = isPassword(p_Password);

    IF(passwordReason = 1) THEN  -- 1 : ERR00032 : Password length should be greater than eight.
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00032' AND `language` = p_Language;
    END IF;

    IF(passwordReason = 2) THEN -- 2 : ERR00036 : Password must contain at least 1 lowercase letter.
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00036' AND `language` = p_Language;
    END IF;

    IF(passwordReason = 3) THEN -- 3 : ERR00037 : Password must contain at least 1 uppercase letter.
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00037' AND `language` = p_Language;
    END IF;

    IF(passwordReason = 4) THEN -- 4 : ERR00038 : Password must contain at least 1 digit.
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00038' AND `language` = p_Language;
    END IF;

    IF(passwordReason = 5) THEN -- 5 : ERR00039 : Password must contain at least 1 special character form ( @,%,!,#,$,:,(,),{,},~,_ ).
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00039' AND `language` = p_Language;
    END IF;
                    
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Source)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00022' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;
	-- Input check block : END

	-- Email format valdation block : START
  IF( !isEmail(p_EmailID) ) THEN 
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00001' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  -- Email format valdation block : END

  -- Phone Number valdation block : START
  ELSEIF(  !isNumeric(p_PhoneNumber) OR LENGTH(p_PhoneNumber) != 10 ) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00002' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  -- Phone Number valdation block : END
  END IF;
	
  -- User Policy ID valdation block : START
  SET RowCount = ( SELECT 1 FROM `userPolicy` WHERE uniqueID = p_userPolicyID);
  IF(  RowCount = 0 OR RowCount IS NULL ) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00034' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;
  -- User Policy ID valdation block : END

	-- Duplicate validation block : START
	SET RowCount = ( SELECT 1 FROM `userInformation` WHERE emailID = p_EmailID);
    
  IF(RowCount > 0 ) THEN 
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00004' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;

	SET RowCount = ( SELECT 1 FROM `userInformation` WHERE phoneNumber = p_PhoneNumber);
    
  IF(RowCount > 0 ) THEN 
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00003' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;

  SET RowCount = 0;
	SET RowCount = ( SELECT 1 FROM userInformation WHERE username = p_Username );
    
  IF(RowCount > 0 ) THEN 
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage,p_PhoneNumber UserPhoneNumber,p_EmailID UserEmailID,p_Username Username ,op_UUID as UserUUID FROM messageMaster WHERE Code = 'ERR00045' AND language = p_Language;
    LEAVE proc_Call;
  END;
  END IF;

	-- Duplicate validation block : END

  -- Customer Account creation block : START

  START TRANSACTION;
  SET op_UUID = UUID();
    INSERT INTO `userInformation`(
      `password`,
      `firstName`,
      `middleName`,
      `lastName`, 
      `emailID`, 
      `phoneNumber`,
      `lastUpdateDatetime`,
      `userPolicyID`,
      `username`,
      `UUID`
    ) 
    VALUES (
      AES_ENCRYPT(p_Password,p_EmailID),
      p_FirstName,
      p_MiddleName,
      p_LastName,
      p_EmailID,
      p_PhoneNumber,
      CURRENT_TIMESTAMP(),
      p_userPolicyID,
      p_Username ,
      op_UUID
    );
  COMMIT WORK;
  -- Customer Account creation block : END

  SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,p_PhoneNumber CustomerPhoneNumber,p_EmailID CustomerEmailID,p_Username Username,op_UUID as CustomerUUID FROM `messageMaster` WHERE `Code` = 'ERR00035' AND `language` = p_Language;

END$$

CREATE DEFINER=`wgotanfi`@`localhost` PROCEDURE `USP_markLogin` (IN `p_username` VARCHAR(255), IN `p_loginFail` VARCHAR(255))  proc_Call:BEGIN
  DECLARE RowCount INT DEFAULT 0;
  DECLARE ErrorNumber INT;
  DECLARE ErrorMessage VARCHAR(1000);

DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00000' AND language = 'English';
      ROLLBACK;
    END;

  IF NOT EXISTS( SELECT 1 FROM userInformation WHERE username = p_username OR phoneNumber = p_username OR emailID = p_username ) THEN
    LEAVE proc_Call;
  END IF;
  
  IF(p_loginFail = 'NO' ) THEN
    BEGIN
      START TRANSACTION;
    
        UPDATE userinformation SET InvaildUpdateAttemptsCount = 0
          WHERE username = p_username OR phoneNumber = p_username OR emailID = p_username ;
      
      COMMIT WORK;
    END;
    ELSE

      START TRANSACTION;
    
      UPDATE userinformation UserInfo
        JOIN userpolicy UP ON UP.uniqueID = UserInfo.UserPolicyID
        SET UserInfo.InvaildUpdateAttemptsCount =  ( UserInfo.InvaildUpdateAttemptsCount + 1 ),
        UserInfo.isLock = 
         CASE WHEN UserInfo.InvaildUpdateAttemptsCount > UP.invaildUpdateAttemptsAllowed 
            THEN 1 
            ELSE 0 
         END
        WHERE UserInfo.username = p_username OR UserInfo.phoneNumber = p_username OR UserInfo.emailID = p_username;
      
      COMMIT WORK;

  END IF;

END$$

CREATE DEFINER=`wgotanfi`@`localhost` PROCEDURE `USP_userLogin` (IN `p_op_Username` VARCHAR(255), IN `p_Password` VARCHAR(255), IN `p_Source` VARCHAR(255), IN `p_Language` VARCHAR(255))  proc_Call:BEGIN
  DECLARE RowCount INT DEFAULT 0;
  DECLARE ErrorNumber INT;
  DECLARE ErrorMessage VARCHAR(1000);
  
  DECLARE op_UserEmail VARCHAR(225);
  DECLARE op_UserPhoneNumber VARCHAR(10);
  DECLARE op_Username VARCHAR(225);

  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
      SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00000' AND `language` = p_Language;
      ROLLBACK;
    END;

  -- Language check block : START
  IF ( stringIsNull(p_Language)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00012' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS (select 1 from languageLookup where language = p_Language) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00009' AND `language` = 'English';
    LEAVE proc_Call;
  END;
  END IF;
  -- Language check block : END
  
  -- Input check block : START
  IF(stringIsNull(p_op_Username)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00010' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Source)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00022' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Password)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00011' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS(  SELECT 1 FROM lookUp WHERE name = p_Source AND category = 'source' AND languageID = getLanguageID(p_Language)  ) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail,op_UserPhoneNumber,op_Username  FROM `messageMaster`  WHERE `Code` = 'ERR00033' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;
	-- Input check block : END
    
    
  -- Credentials validation block : START

  IF EXISTS(SELECT 1 FROM `userInformation` WHERE ( emailID = p_op_Username OR phoneNumber = p_op_Username OR username = p_op_Username ) AND isLock = 1) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00071' AND `language` = p_Language;
    LEAVE proc_Call;   
  END;
  END IF;

  SELECT phoneNumber,emailID,username INTO op_UserPhoneNumber,op_UserEmail,op_Username FROM `userInformation` WHERE ( emailID = p_op_Username OR phoneNumber = p_op_Username OR username = p_op_Username ) AND isLock = 0;

  IF(stringIsNull(op_UserEmail)) THEN
  BEGIN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00008' AND `language` = p_Language;
    LEAVE proc_Call;
  END;
  END IF;


  SET RowCount = ( SELECT 1 FROM `userInformation` WHERE emailID = op_UserEmail AND password = AES_ENCRYPT(p_Password,op_UserEmail) );
  
  IF(RowCount > 0 ) THEN
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00006' AND `language` = p_Language;
  ELSE
    SELECT `Code`,`ErrorFound`,`Message`,`version`,`language`,ErrorMessage,op_UserEmail UserEmail,op_UserPhoneNumber UserPhoneNumber,op_Username Username FROM `messageMaster` WHERE `Code` = 'ERR00008' AND `language` = p_Language;
  END IF;
  -- Credentials validation block : END
END$$

CREATE DEFINER=`wgotanfi`@`localhost` PROCEDURE `USP_userOTPLogger` (IN `p_sendTo` VARCHAR(255), IN `p_OTP` VARCHAR(255))  proc_Call:BEGIN
  DECLARE ErrorNumber INT;
  DECLARE ErrorMessage VARCHAR(1000);
      
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
    SELECT 'YES' ErrorFound ,ErrorMessage Message;
    ROLLBACK;
  END;


  -- Parameter validation block : START
  IF (stringIsNull(p_sendTo)) THEN
  BEGIN
    SELECT 'YES' ErrorFound ,'sendTo is null' Message;
  END;
  ELSEIF (stringIsNull(p_OTP)) THEN
  BEGIN
    SELECT 'YES' ErrorFound ,'OTP is null' Message;
    LEAVE proc_Call;
  END;
  END IF;
  -- Parameter validation block : END

  -- Insertion block into User OTP Log  : START
  START TRANSACTION;
  
    DELETE FROM userOTPLog WHERE userEmailID = p_sendTo;
    
    INSERT INTO userOTPLog( userEmailID, OTP ) 
    VALUES ( p_sendTo,p_OTP );

  COMMIT WORK;
      
  SELECT 'NO' ErrorFound ,'OTP save successfully.' Message;
  -- Insertion block into User OTP Log  : START

END$$

CREATE DEFINER=`wgotanfi`@`localhost` PROCEDURE `USP_userPasswordReset` (IN `p_EmailID` VARCHAR(255), IN `p_OTP` VARCHAR(255), IN `p_NewPassword` VARCHAR(255), IN `p_ConfirmPassword` VARCHAR(255), IN `p_Source` VARCHAR(255), IN `p_Language` VARCHAR(255))  proc_Call:BEGIN
  DECLARE RowCount INT DEFAULT 0;
  DECLARE ErrorNumber INT;
  DECLARE ErrorMessage VARCHAR(1000);
  DECLARE OTPExpiryTime DATETIME;
  DECLARE OTPSendTime DATETIME;
  DECLARE OTPTimeForValidationInSeconds INT;

  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    GET CURRENT DIAGNOSTICS CONDITION 1 ErrorNumber = MYSQL_ERRNO,ErrorMessage = MESSAGE_TEXT;
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00000' AND language = p_Language;
    ROLLBACK;
  END;

  -- Language check block : START
  IF (stringIsNull(p_Language)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00012' AND language = 'English';
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS (select 1 from languageLookup where language = p_Language) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00009' AND language = 'English';
    LEAVE proc_Call;
  END;
  END IF;
  -- Language check block : END
  
  -- Input check block : START
  IF(stringIsNull(p_EmailID)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00019' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (NOT isEmail(p_EmailID)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00001' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_Source)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00022' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_NewPassword)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00011' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF (stringIsNull(p_ConfirmPassword)) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00017' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF ( STRCMP( p_NewPassword,p_ConfirmPassword ) ) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00013' AND language = p_Language;
    LEAVE proc_Call;
  END;
  ELSEIF( isPassword(p_NewPassword) != 0 ) THEN
  BEGIN
        
    DECLARE  passwordReason tinyint(4);
    SET passwordReason = isPassword(p_NewPassword);

    IF(passwordReason = 1) THEN  -- 1 : ERR00032 : Password length should be greater than eight.
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00032' AND language = p_Language;
    END IF;

    IF(passwordReason = 2) THEN -- 2 : ERR00036 : Password must contain at least 1 lowercase letter.
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00036' AND language = p_Language;
    END IF;

    IF(passwordReason = 3) THEN -- 3 : ERR00037 : Password must contain at least 1 uppercase letter.
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00037' AND language = p_Language;
    END IF;

    IF(passwordReason = 4) THEN -- 4 : ERR00038 : Password must contain at least 1 digit.
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00038' AND language = p_Language;
    END IF;

    IF(passwordReason = 5) THEN -- 5 : ERR00039 : Password must contain at least 1 special character form ( @,%,!,#,$,:,(,),{,},~,_ ).
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage FROM messageMaster WHERE Code = 'ERR00039' AND language = p_Language;
    END IF;
                    
    LEAVE proc_Call;
  END;
  ELSEIF NOT EXISTS(  SELECT 1 FROM lookUp WHERE name = p_Source AND category = 'source' AND languageID =  getLanguageID(p_Language)  ) THEN
  BEGIN
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage  FROM messageMaster  WHERE Code = 'ERR00033' AND language = p_Language;
    LEAVE proc_Call;
  END;
  END IF;
	-- Input check block : END
    
  
  -- User verification block : START  
    IF NOT EXISTS(  SELECT 1 FROM userInformation WHERE emailID = p_EmailID AND deletedAt IS NULL ) THEN
    BEGIN
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage  FROM messageMaster  WHERE Code = 'ERR00042' AND language = p_Language;
      LEAVE proc_Call;
    END;
    END IF;
  -- User verification block : END

  -- OTP verification block : START  
    IF NOT EXISTS(  SELECT 1 FROM userOTPLog WHERE userEmailID = p_EmailID AND OTP = p_OTP  ) THEN
    BEGIN
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage  FROM messageMaster  WHERE Code = 'ERR00041' AND language = p_Language;
      LEAVE proc_Call;
    END;
    END IF;

    SET OTPTimeForValidationInSeconds = ( SELECT otpValidTime FROM userPolicy WHERE uniqueID = ( SELECT UserPolicyID FROM userInformation WHERE emailID = p_EmailID LIMIT 1 ) );
    SET OTPSendTime = ( SELECT sendTime FROM userOTPLog WHERE userEmailID = p_EmailID AND OTP = p_OTP);

    SET OTPExpiryTime = DATE_ADD( OTPSendTime, INTERVAL OTPTimeForValidationInSeconds SECOND );

    IF ( CURRENT_TIMESTAMP()  >  OTPExpiryTime ) THEN
    BEGIN
      SELECT Code,ErrorFound,Message,version,language,ErrorMessage  FROM messageMaster  WHERE Code = 'ERR00046' AND language = p_Language;
      LEAVE proc_Call;
    END;
    END IF;

  -- OTP verification block : END

  -- Password Update block : START

    START TRANSACTION;
  
      UPDATE userInformation 
        SET password = AES_ENCRYPT(p_NewPassword,p_EmailID) , isLock = 0, InvaildUpdateAttemptsCount = 0 , lastUpdateDatetime = CURRENT_TIMESTAMP() 
        WHERE emailID = p_EmailID AND deletedAt IS NULL ;

      DELETE FROM userOTPLog WHERE userEmailID = p_EmailID AND OTP = p_OTP;
      
    COMMIT WORK;
    
    SELECT Code,ErrorFound,Message,version,language,ErrorMessage  FROM messageMaster  WHERE Code = 'ERR00043' AND language = p_Language;
  -- Password Update block : END

END$$

--
-- Functions
--
CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `getLanguageID` (`val` VARCHAR(1024)) RETURNS INT(10) BEGIN
  DECLARE LangCode INT(10);

SET LangCode = (SELECT uniqueID FROM languageLookup WHERE `language` = val);
 return LangCode;
END$$

CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `isEmail` (`val` VARCHAR(255)) RETURNS TINYINT(1) return val regexp '^[a-zA-Z0-9][a-zA-Z0-9._-]*@[a-zA-Z0-9][a-zA-Z0-9._-]*\\.[a??-zA-Z]{2,4}$'

-- SELECT isEmail('vf@jv.cd')$$

CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `isNumeric` (`val` VARCHAR(1024)) RETURNS TINYINT(1) return val regexp '^(-|\\+)?([0-9]+\\.[0-9]*|[0-9]*\\.[0-9]+|[0-9]+)$'

-- SELECT isNumeric('95.64')$$

CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `isPassword` (`p_Password` VARCHAR(255)) RETURNS TINYINT(4) BEGIN

     IF(LENGTH(p_Password) < 8) THEN
      RETURN 1;  -- ERR00032 : Password length should be greater than eight.
     END IF;
   
     IF(p_Password NOT RLIKE BINARY '^(?=.*[a-z]).*$') THEN
        RETURN 2;  -- ERR00036 : Password must contain at least 1 lowercase letter.
     END IF;

     IF(p_Password NOT RLIKE BINARY '^(?=.*[A-Z]).*$') THEN
        RETURN 3;  -- ERR00037 : Password must contain at least 1 uppercase letter.
     END IF;

     IF(p_Password NOT RLIKE BINARY '^(?=.*[0-9]).*$') THEN
        RETURN 4;  -- ERR00038 : Password must contain at least 1 digit.
     END IF;

     IF(p_Password NOT RLIKE BINARY '^(?=.*[@|%|!|#|$|:|(|)|{|}|~|_]).*$') THEN
        RETURN 5;  -- ERR00039 : Password must contain at least 1 special character form ( @,%,!,#,$,:,(,),{,},~,_ ).
     END IF;

    RETURN 0;
END$$

CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `stringIfNull` (`p_StringToCheck` VARCHAR(5000), `p_AlternateString` VARCHAR(5000)) RETURNS VARCHAR(5000) CHARSET utf8 COLLATE utf8_unicode_ci BEGIN

  IF( p_StringToCheck IS NULL OR TRIM(p_StringToCheck) = '' ) THEN
    RETURN p_AlternateString ;
  END IF;

  RETURN p_StringToCheck;

END$$

CREATE DEFINER=`wgotanfi`@`localhost` FUNCTION `stringIsNull` (`p_String` VARCHAR(5000)) RETURNS TINYINT(1) BEGIN

  IF( p_String IS NULL OR TRIM(p_String) = '' ) THEN
    RETURN 1 ;
  END IF;

  RETURN 0;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfHomework` date NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT curdate(),
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imageGallery`
--

CREATE TABLE `imageGallery` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagesName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `createDate` date DEFAULT curdate(),
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languageLookup`
--

CREATE TABLE `languageLookup` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languageLookup`
--

INSERT INTO `languageLookup` (`uniqueID`, `language`) VALUES
(1, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `lookUp`
--

CREATE TABLE `lookUp` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languageID` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lookUp`
--

INSERT INTO `lookUp` (`uniqueID`, `code`, `name`, `languageID`, `category`) VALUES
(1, 1, 'Web', 1, 'source'),
(2, 0, 'NO', 1, 'boolean'),
(3, 1, 'YES', 1, 'boolean'),
(4, 1, 'GET', 1, 'httpMethods'),
(5, 2, 'POST', 1, 'httpMethods'),
(6, 1, 'Pre-Nursery (Play Group)', 1, 'classes'),
(7, 2, 'Nursery', 1, 'classes'),
(8, 3, 'KG-1', 1, 'classes'),
(9, 4, 'KG-2', 1, 'classes');

-- --------------------------------------------------------

--
-- Table structure for table `messageMaster`
--

CREATE TABLE `messageMaster` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ErrorFound` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messageMaster`
--

INSERT INTO `messageMaster` (`uniqueID`, `Code`, `ErrorFound`, `Message`, `version`, `language`) VALUES
(1, 'ERR00000', 'YES', 'Invalid Exception.', '1.0.0', 'English'),
(2, 'ERR00001', 'YES', 'Invalid EMail ID.', '1.0.0', 'English'),
(3, 'ERR00002', 'YES', 'Invalid Phone Number.', '1.0.0', 'English'),
(4, 'ERR00003', 'YES', 'Phone Number Already Exists.', '1.0.0', 'English'),
(5, 'ERR00004', 'YES', 'EMail ID Already Exists.', '1.0.0', 'English'),
(6, 'ERR00005', 'YES', 'User Policy cannot be empty.', '1.0.0', 'English'),
(7, 'ERR00006', 'NO', 'Login successfully.', '1.0.0', 'English'),
(8, 'ERR00007', 'NO', 'Signup successfully.', '1.0.0', 'English'),
(9, 'ERR00008', 'YES', 'Invalid username/password.', '1.0.0', 'English'),
(10, 'ERR00009', 'YES', 'Invalid language.', '1.0.0', 'English'),
(11, 'ERR00010', 'YES', 'Username cannot be empty.', '1.0.0', 'English'),
(12, 'ERR00011', 'YES', 'Password cannot be empty.', '1.0.0', 'English'),
(13, 'ERR00012', 'YES', 'Language cannot be empty.', '1.0.0', 'English'),
(14, 'ERR00013', 'YES', 'password/confirm password not match.', '1.0.0', 'English'),
(15, 'ERR00014', 'YES', 'Plan ID cannot be empty.', '1.0.0', 'English'),
(16, 'ERR00015', 'YES', 'First Name cannot be empty.', '1.0.0', 'English'),
(17, 'ERR00016', 'YES', 'Last Name cannot be empty.', '1.0.0', 'English'),
(18, 'ERR00017', 'YES', 'Confirm Password cannot be empty.', '1.0.0', 'English'),
(19, 'ERR00018', 'YES', 'EMail ID cannot be empty.', '1.0.0', 'English'),
(20, 'ERR00019', 'YES', 'Phone Number cannot be empty.', '1.0.0', 'English'),
(21, 'ERR00020', 'YES', 'Plan ID cannot be empty.', '1.0.0', 'English'),
(22, 'ERR00021', 'YES', 'Invalid Plan ID.', '1.0.0', 'English'),
(23, 'ERR00022', 'YES', 'Source cannot be empty.', '1.0.0', 'English'),
(24, 'ERR00023', 'YES', 'Template cannot be empty.', '1.0.0', 'English'),
(25, 'ERR00024', 'YES', 'Message cannot be empty.', '1.0.0', 'English'),
(26, 'ERR00025', 'YES', 'Invalid Template.', '1.0.0', 'English'),
(27, 'ERR00026', 'YES', 'Invalid HTTP-Method.', '1.0.0', 'English'),
(28, 'ERR00027', 'YES', 'Invalid API Name.', '1.0.0', 'English'),
(29, 'ERR00028', 'NO', 'URL generation successfully.', '1.0.0', 'English'),
(30, 'ERR00029', 'NO', 'Template return successfully.', '1.0.0', 'English'),
(31, 'ERR00030', 'NO', 'Message sent successfully.', '1.0.0', 'English'),
(32, 'ERR00031', 'YES', 'Unable to sent message, Please try some time.', '1.0.0', 'English'),
(33, 'ERR00032', 'YES', 'Password length should be at least eight character.', '1.0.0', 'English'),
(34, 'ERR00033', 'YES', 'Invalid Source.', '1.0.0', 'English'),
(35, 'ERR00034', 'YES', 'Invalid User Policy.', '1.0.0', 'English'),
(36, 'ERR00035', 'NO', 'User created successfully.', '1.0.0', 'English'),
(37, 'ERR00036', 'YES', 'Password must contain at least 1 lowercase letter.', '1.0.0', 'English'),
(38, 'ERR00037', 'YES', 'Password must contain at least 1 uppercase letter.', '1.0.0', 'English'),
(39, 'ERR00038', 'YES', 'Password must contain at least 1 digit.', '1.0.0', 'English'),
(40, 'ERR00039', 'YES', 'Password must contain at least 1 special character form ( @,%,!,#,$,:,(,),{,},~,_ ).', '1.0.0', 'English'),
(41, 'ERR00040', 'YES', 'OTP cannot be empty.', '1.0.0', 'English'),
(42, 'ERR00041', 'YES', 'Invalid OTP.', '1.0.0', 'English'),
(43, 'ERR00042', 'YES', 'User not exists.', '1.0.0', 'English'),
(44, 'ERR00043', 'NO', 'Password update successfully.', '1.0.0', 'English'),
(45, 'ERR00044', 'YES', 'Username cannot be empty.', '1.0.0', 'English'),
(46, 'ERR00045', 'YES', 'Username Already Exists.', '1.0.0', 'English'),
(47, 'ERR00046', 'YES', 'OTP is expired.', '1.0.0', 'English'),
(48, 'ERR00047', 'NO', 'Insert to Third Party API Setup successfully.', '1.0.0', 'English'),
(49, 'ERR00048', 'YES', 'Transaction amount cannot be empty.', '1.0.0', 'English'),
(50, 'ERR00049', 'YES', 'Circle Id cannot be empty.', '1.0.0', 'English'),
(51, 'ERR00050', 'YES', 'Transaction Id cannot be empty.', '1.0.0', 'English'),
(52, 'ERR00051', 'YES', 'Service ID number cannot be empty.', '1.0.0', 'English'),
(53, 'ERR00052', 'YES', 'Provider Id cannot be empty.', '1.0.0', 'English'),
(54, 'ERR00053', 'YES', 'Batch size cannot be empty.', '1.0.0', 'English'),
(55, 'ERR00054', 'YES', 'Page Number cannot be empty.', '1.0.0', 'English'),
(56, 'ERR00055', 'YES', 'Invalid Batch size.', '1.0.0', 'English'),
(57, 'ERR00056', 'YES', 'Invalid Page Number.', '1.0.0', 'English'),
(58, 'ERR00057', 'YES', 'Please enter at least one account identifier', '1.0.0', 'English'),
(59, 'ERR00058', 'NO', 'Account details return successfully.', '1.0.0', 'English'),
(60, 'ERR00059', 'NO', 'Product details update successfully.', '1.0.0', 'English'),
(61, 'ERR00060', 'YES', 'Product ID cannot be empty.', '1.0.0', 'English'),
(62, 'ERR00061', 'YES', 'Invalid Product ID.', '1.0.0', 'English'),
(63, 'ERR00062', 'YES', 'Product Name cannot be empty.', '1.0.0', 'English'),
(64, 'ERR00063', 'YES', 'Product Description cannot be empty.', '1.0.0', 'English'),
(65, 'ERR00064', 'YES', 'Pre-Registration cannot be empty.', '1.0.0', 'English'),
(66, 'ERR00065', 'YES', 'Product amount cannot be empty.', '1.0.0', 'English'),
(67, 'ERR00066', 'YES', 'Invalid Product amount.', '1.0.0', 'English'),
(68, 'ERR00067', 'YES', 'Product category cannot be empty.', '1.0.0', 'English'),
(69, 'ERR00068', 'YES', 'Invalid Product category.', '1.0.0', 'English'),
(70, 'ERR00069', 'YES', 'Pre-Registration time cannot be empty.', '1.0.0', 'English'),
(71, 'ERR00070', 'YES', 'Invalid Pre-Registration time.', '1.0.0', 'English'),
(72, 'ERR00071', 'YES', 'Your user is locked due invalid login attempts.', '1.0.0', 'English'),
(73, 'ERR00072', 'YES', 'API Name cannot be empty.', '1.0.0', 'English'),
(74, 'ERR00073', 'YES', 'Server cannot be empty.', '1.0.0', 'English'),
(75, 'ERR00074', 'YES', 'Resource cannot be empty.', '1.0.0', 'English'),
(76, 'ERR00075', 'YES', 'Method cannot be empty.', '1.0.0', 'English'),
(77, 'ERR00076', 'YES', 'Receiver Tag cannot be empty.', '1.0.0', 'English'),
(78, 'ERR00077', 'YES', 'Message Tag cannot be empty.', '1.0.0', 'English'),
(79, 'ERR00078', 'YES', 'Response Status Tag cannot be empty.', '1.0.0', 'English'),
(80, 'ERR00079', 'YES', 'Response Message Tag cannot be empty.', '1.0.0', 'English'),
(81, 'ERR00080', 'YES', 'Sender Tag cannot be empty.', '1.0.0', 'English'),
(82, 'ERR00081', 'YES', 'Sender Name cannot be empty.', '1.0.0', 'English'),
(83, 'ERR00082', 'YES', 'SMS API Setup update successfully.', '1.0.0', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `principalMessages`
--

CREATE TABLE `principalMessages` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `createDate` date DEFAULT curdate(),
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userInformation`
--

CREATE TABLE `userInformation` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `password` varbinary(255) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UUID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationDatetime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `lastUpdateDatetime` datetime(6) NOT NULL,
  `invaildUpdateAttemptsCount` int(11) NOT NULL DEFAULT 0,
  `userPolicyID` bigint(20) UNSIGNED NOT NULL,
  `isLock` tinyint(4) NOT NULL DEFAULT 0,
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userInformation`
--

INSERT INTO `userInformation` (`uniqueID`, `password`, `firstName`, `middleName`, `lastName`, `emailID`, `phoneNumber`, `username`, `UUID`, `creationDatetime`, `lastUpdateDatetime`, `invaildUpdateAttemptsCount`, `userPolicyID`, `isLock`, `deletedAt`) VALUES
(1, 0x545c236d73fe1231a0865f50a428da30, 'Super', NULL, 'user', 'shubhamjobanputra@gmail.com', '9074200979', 'superUser', '68f244b0-f3ea-11e9-b2f6-1866daef6490', '2019-10-21 18:06:06.371879', '2019-10-21 18:06:06.000000', 0, 1, 0, NULL),
(2, 0xf663eedc213f0c105a13e151488d0d85, 'Deepak', NULL, 'Mathur', 'dpskidsbhopal@gmail.com', '8878650500', 'DPSkidsAdmin', '68f5a3b1-f3ea-11e9-b2f6-1866daef6490', '2019-10-21 18:06:06.393972', '2019-10-21 18:06:06.000000', 0, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userOTPLog`
--

CREATE TABLE `userOTPLog` (
  `userEmailID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OTP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sendTime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userPolicy`
--

CREATE TABLE `userPolicy` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `policyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invaildUpdateAttemptsAllowed` int(11) NOT NULL DEFAULT 3,
  `otpValidTime` int(11) NOT NULL DEFAULT 180,
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userPolicy`
--

INSERT INTO `userPolicy` (`uniqueID`, `policyName`, `invaildUpdateAttemptsAllowed`, `otpValidTime`, `deletedAt`) VALUES
(1, 'superUser', 3, 180, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videoGallery`
--

CREATE TABLE `videoGallery` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videoName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `createDate` date DEFAULT curdate(),
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weekSchedules`
--

CREATE TABLE `weekSchedules` (
  `uniqueID` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT curdate(),
  `deletedAt` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `imageGallery`
--
ALTER TABLE `imageGallery`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `languageLookup`
--
ALTER TABLE `languageLookup`
  ADD PRIMARY KEY (`uniqueID`),
  ADD UNIQUE KEY `language` (`language`);

--
-- Indexes for table `lookUp`
--
ALTER TABLE `lookUp`
  ADD PRIMARY KEY (`uniqueID`,`code`),
  ADD KEY `FK_lookUp_languageID` (`languageID`);

--
-- Indexes for table `messageMaster`
--
ALTER TABLE `messageMaster`
  ADD PRIMARY KEY (`uniqueID`),
  ADD KEY `FK_messageMaster_language` (`language`);

--
-- Indexes for table `principalMessages`
--
ALTER TABLE `principalMessages`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `userInformation`
--
ALTER TABLE `userInformation`
  ADD PRIMARY KEY (`uniqueID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `UUID` (`UUID`),
  ADD KEY `FK_userInformation_userPolicyID` (`userPolicyID`);

--
-- Indexes for table `userPolicy`
--
ALTER TABLE `userPolicy`
  ADD PRIMARY KEY (`uniqueID`),
  ADD UNIQUE KEY `policyName` (`policyName`);

--
-- Indexes for table `videoGallery`
--
ALTER TABLE `videoGallery`
  ADD PRIMARY KEY (`uniqueID`);

--
-- Indexes for table `weekSchedules`
--
ALTER TABLE `weekSchedules`
  ADD PRIMARY KEY (`uniqueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imageGallery`
--
ALTER TABLE `imageGallery`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languageLookup`
--
ALTER TABLE `languageLookup`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lookUp`
--
ALTER TABLE `lookUp`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messageMaster`
--
ALTER TABLE `messageMaster`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `principalMessages`
--
ALTER TABLE `principalMessages`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userInformation`
--
ALTER TABLE `userInformation`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userPolicy`
--
ALTER TABLE `userPolicy`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videoGallery`
--
ALTER TABLE `videoGallery`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekSchedules`
--
ALTER TABLE `weekSchedules`
  MODIFY `uniqueID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
