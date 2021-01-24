/* fix the halloffamers table */

/* to prevent errors fix the table first */
ALTER TABLE halloffamers CHANGE updated_at updated_at TIMESTAMP NULL;

/* SELECT table_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and COLUMN_NAME IN ('created_at', 'updated_at', 'updated_by') */
/* halloffamers */
ALTER TABLE halloffamers
    ADD updated_by VARCHAR(50) NULL AFTER created_at;

/* add the names of the people */
UPDATE halloffamers SET updated_by = "ADMIN";