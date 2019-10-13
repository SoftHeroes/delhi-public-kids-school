ALTER TABLE userinformation
ADD CONSTRAINT FK_userinformation_userPolicyID FOREIGN KEY (userPolicyID)
REFERENCES userpolicy (uniqueID) ON DELETE NO ACTION;

ALTER TABLE messagemaster
ADD CONSTRAINT FK_messagemaster_language FOREIGN KEY (language)
REFERENCES languagelookup (language) ON DELETE NO ACTION;

ALTER TABLE lookup
ADD CONSTRAINT FK_lookup_languageID FOREIGN KEY (languageID)
REFERENCES languagelookup (uniqueID) ON DELETE NO ACTION;