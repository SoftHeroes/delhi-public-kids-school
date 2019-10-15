SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS userInformation;
CREATE TABLE userInformation (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	password varbinary(255) NOT NULL,
	firstName varchar(255) NOT NULL,
	middleName varchar(255) DEFAULT NULL,
	lastName varchar(255) NOT NULL,
	emailID varchar(255) NOT NULL,
	phoneNumber varchar(255) NOT NULL,
	username VARCHAR(255) NOT NULL UNIQUE,
	UUID VARCHAR(255) NOT NULL UNIQUE,
	creationDatetime DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	lastUpdateDatetime DATETIME(6) NOT NULL,
	invaildUpdateAttemptsCount int(11) NOT NULL DEFAULT 0,
	userPolicyID bigint(20) UNSIGNED NOT NULL,
	isLock TINYINT NOT NULL DEFAULT '0',
	deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS userPolicy;
CREATE TABLE userPolicy (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	policyName varchar(255) NOT NULL UNIQUE,
	invaildUpdateAttemptsAllowed int(11) NOT NULL DEFAULT 3,
	otpValidTime int(11) NOT NULL DEFAULT 180,
	deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS userOTPLog;
CREATE TABLE userOTPLog (
	userEmailID varchar(255) NOT NULL,
	OTP varchar(255) NOT NULL,
	sendTime DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP()
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS messageMaster;
CREATE TABLE messageMaster (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	Code varchar(255) NOT NULL,
	ErrorFound varchar(255) NOT NULL,
	Message varchar(255) NOT NULL,
	version varchar(255) NOT NULL,
	language varchar(255) NOT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS languageLookup;
CREATE TABLE languageLookup (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	language varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS lookup;
CREATE TABLE lookup (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	code bigint(20) UNSIGNED NOT NULL,
	name varchar(255) NOT NULL,
	languageID BIGINT(20) UNSIGNED NOT NULL,
	category varchar(255) NOT NULL,
	PRIMARY KEY (uniqueID, code)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS sliders;
CREATE TABLE sliders (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	title varchar(255) NOT NULL,
	imageName varchar(255) NOT NULL,
  deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS homeworks;
CREATE TABLE homeworks (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  class varchar(255) NOT NULL,
	text varchar(255) DEFAULT NULL,
  dateOfHomework DATE NOT NULL,
	imageName varchar(255) DEFAULT NULL,
  createDate DATETIME(6) DEFAULT CURRENT_TIMESTAMP(),
  deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS weekSchedules;
CREATE TABLE weekSchedules (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  class varchar(255) NOT NULL,
	text varchar(255) DEFAULT NULL,
  startDate date NOT NULL,
  endDate date NOT NULL,
	imageName varchar(255) DEFAULT NULL,
  deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS principalMessages;
CREATE TABLE principalMessages (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  subtitle INT NOT NULL,
  createDate DATETIME(6) DEFAULT CURRENT_TIMESTAMP(),
  deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

DROP TABLE IF EXISTS students;
CREATE TABLE students (
	uniqueID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  dateOfBirth DATE NOT NULL,
	imageName varchar(255) NOT NULL,
  deletedAt DATETIME(6) DEFAULT NULL,
	PRIMARY KEY (uniqueID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

SET FOREIGN_KEY_CHECKS = 1;