ALTER TABLE userInformation
ADD CONSTRAINT FK_userInformation_userPolicyID FOREIGN KEY (userPolicyID)
REFERENCES userPolicy (uniqueID) ON DELETE NO ACTION;

ALTER TABLE messageMaster
ADD CONSTRAINT FK_messageMaster_language FOREIGN KEY (language)
REFERENCES languageLookup (language) ON DELETE NO ACTION;

ALTER TABLE lookUp
ADD CONSTRAINT FK_lookUp_languageID FOREIGN KEY (languageID)
REFERENCES languageLookup (uniqueID) ON DELETE NO ACTION;