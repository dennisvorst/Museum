/* alter the tables */
/* clubarticles */
ALTER TABLE clubarticles
    ADD created_at TIMESTAMP NULL AFTER cdmanually, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* clubphotos */
ALTER TABLE clubphotos 
    ADD created_at TIMESTAMP NULL AFTER idphoto, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* clubretired */
ALTER TABLE clubretired 
    ADD created_at TIMESTAMP NULL AFTER nrjersey, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* clubvideos */
ALTER TABLE clubvideos 
    ADD created_at TIMESTAMP NULL AFTER cdmanually, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* personaliases */
ALTER TABLE personaliases 
    ADD created_at TIMESTAMP NULL AFTER nmperson, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* personvideos */
ALTER TABLE personvideos 
    ADD created_at TIMESTAMP NULL AFTER cdmanually, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* update the fields */
/* clubarticles */
UPDATE clubarticles SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";
/* clubphotos */
UPDATE clubphotos SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";
/* clubretired */
UPDATE clubretired SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";
/* clubvideos */
UPDATE clubvideos SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";
/* personaliases */
UPDATE personaliases SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";
/* personvideos */
UPDATE personvideos SET created_at = "2007-08-25 00:00:00", updated_by = "ADMIN";


/* set the mandatory values */
/* clubarticles */
ALTER TABLE clubarticles CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE clubarticles CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* clubphotos */
ALTER TABLE clubphotos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE clubphotos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* clubretired */
ALTER TABLE clubretired CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE clubretired CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* clubvideos */
ALTER TABLE clubvideos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE clubvideos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* personaliases */
ALTER TABLE personaliases CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE personaliases CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* personvideos */
ALTER TABLE personvideos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE personvideos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 