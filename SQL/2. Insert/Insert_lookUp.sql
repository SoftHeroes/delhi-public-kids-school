INSERT INTO lookUp (code,name,languageID,category)
  SELECT * FROM (SELECT 1 AS code,'Web',1 AS languageID,'source') AS tmp
WHERE NOT EXISTS (
    SELECT category,code,name,languageID FROM lookUp WHERE code = 1 AND name = 'Web' AND languageID = 1 AND category = 'source'
) LIMIT 1;


INSERT INTO lookUp (code,name,languageID,category)
  SELECT * FROM (SELECT 0 AS code,'NO',1 AS languageID,'boolean') AS tmp
WHERE NOT EXISTS (
    SELECT category,code,name,languageID FROM lookUp WHERE code = 0 AND name = 'NO' AND languageID = 1 AND category = 'boolean'
) LIMIT 1;

INSERT INTO lookUp (code,name,languageID,category)
  SELECT * FROM (SELECT 1 AS code,'YES',1 AS languageID,'boolean') AS tmp
WHERE NOT EXISTS (
    SELECT category,code,name,languageID FROM lookUp WHERE code = 1 AND name = 'YES' AND languageID = 1 AND category = 'boolean'
) LIMIT 1;

INSERT INTO lookUp (code,name,languageID,category)
  SELECT * FROM (SELECT 1 AS code,'GET',1 AS languageID,'httpMethods') AS tmp
WHERE NOT EXISTS (
    SELECT category,code,name,languageID FROM lookUp WHERE code = 1 AND name = 'GET' AND languageID = 1 AND category = 'httpMethods'
) LIMIT 1;

INSERT INTO lookUp (code,name,languageID,category)
  SELECT * FROM (SELECT 2 AS code,'POST',1 AS languageID,'httpMethods') AS tmp
WHERE NOT EXISTS (
    SELECT category,code,name,languageID FROM lookUp WHERE code = 2 AND name = 'POST' AND languageID = 1 AND category = 'httpMethods'
) LIMIT 1;