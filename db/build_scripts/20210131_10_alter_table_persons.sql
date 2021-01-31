ALTER TABLE persons DROP IF EXISTS dthof;
ALTER TABLE persons DROP IF EXISTS idphotohof;

ALTER TABLE persons ADD dthof DATE NULL AFTER nmclubstart;
ALTER TABLE persons ADD idphotohof INT NULL AFTER dthof; 
ALTER TABLE persons CHANGE ftbiography ftbiography TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 