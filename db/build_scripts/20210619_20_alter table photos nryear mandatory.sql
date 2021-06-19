start transaction;
ALTER TABLE `photos` CHANGE `nryear` `nryear` INT(4) NOT NULL DEFAULT '0000'; 
ALTER TABLE `photos` CHANGE `nryear` `nryear` INT(4) NOT NULL DEFAULT '0' COMMENT 'Year of publication'; 
commit
