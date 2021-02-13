SELECT *
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
WHERE constraint_schema = "museum_test"
AND constraint_name != 'PRIMARY'
ORDER BY table_name;

-- there should be 32
SELECT count(*)
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
WHERE constraint_schema = "museum_test"
AND constraint_name != 'PRIMARY'
ORDER BY table_name;