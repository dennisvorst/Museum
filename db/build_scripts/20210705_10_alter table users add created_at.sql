start transaction;

/* clubvideos */
ALTER TABLE users
    ADD created_at TIMESTAMP NULL AFTER nmpassword, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

UPDATE users SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";

ALTER TABLE users CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE users CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 

commit
