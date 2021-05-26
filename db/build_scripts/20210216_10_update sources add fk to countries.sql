start transaction;
ALTER TABLE sources ADD cdcountry CHAR(5) NOT NULL DEFAULT 'NLD' AFTER nmcity; 

ALTER TABLE sources
  ADD CONSTRAINT country_sources_1 FOREIGN KEY (cdcountry) REFERENCES countries (cdcountry);
commit;


UPDATE `sources` SET `cdcountry` = 'USA' WHERE `sources`.`idsource` = 33; 
UPDATE `sources` SET `cdcountry` = 'USA' WHERE `sources`.`idsource` = 39; 
UPDATE `sources` SET `cdcountry` = 'DEU' WHERE `sources`.`idsource` = 42; 
UPDATE `sources` SET `cdcountry` = 'CUW' WHERE `sources`.`idsource` = 52; 