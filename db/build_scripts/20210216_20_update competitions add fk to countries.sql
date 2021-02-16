start transaction;
ALTER TABLE competitions ADD cdcountry CHAR(5) NOT NULL DEFAULT 'NLD' AFTER cdgender; 

ALTER TABLE competitions
  ADD CONSTRAINT country_competitions_1 FOREIGN KEY (cdcountry) REFERENCES countries (cdcountry);

ALTER TABLE `competitions` CHANGE `dtstart` `dtstart` DATE NULL; 
ALTER TABLE `competitions` CHANGE `dtend` `dtend` DATE NULL; 

update competitions set dtstart = null where dtstart = "0000-00-00";
update competitions set dtend = null where dtend = "0000-00-00";
commit
