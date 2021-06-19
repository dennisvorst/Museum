start transaction;
ALTER TABLE `articles` CHANGE `nryear` `nryear` YEAR(4) NOT NULL COMMENT 'Year of publication'; 
commit
