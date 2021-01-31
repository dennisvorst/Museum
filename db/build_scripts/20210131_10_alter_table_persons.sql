ALTER TABLE persons DROP IF EXISTS is_hof;
ALTER TABLE persons DROP IF EXISTS idphotohof;

ALTER TABLE persons ADD is_hof tinyint(1) NOT NULL DEFAULT 0 AFTER nmclubstart;
ALTER TABLE persons ADD idphotohof INT NULL AFTER is_hof; 
ALTER TABLE persons CHANGE ftbiography ftbiography TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 