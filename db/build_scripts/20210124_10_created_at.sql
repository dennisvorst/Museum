
/* add the created_at, updated_at and updated_by values */
/*  SELECT table_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and COLUMN_NAME = 'dtlastmut' */

/* pre select */
SELECT "Select the tables with existing dtcreated, updated_at, updated_by and created_at columns ";
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'museum' 
AND COLUMN_NAME IN ('dtcreated', 'updated_at', 'updated_by', 'created_at');

SELECT "Select the tables with existing dtlmut, dtlastmut, nmlmut, nmlastmut, featured, dtprevmut and dtcreated columns ";
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'museum' 
AND COLUMN_NAME IN ('dtlmut', 'dtlastmut', 'nmlmut', 'nmlastmut', 'featured', 'dtprevmut', 'dtcreated');

/* articlephotos */
ALTER TABLE articlephotos
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* articles */
ALTER TABLE articles 
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* clubs */
ALTER TABLE clubs
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* competitions */
ALTER TABLE competitions
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* fielding */
ALTER TABLE fielding
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* games */
ALTER TABLE games
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* hitting */
ALTER TABLE hitting
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* lineups */
ALTER TABLE lineups
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* participants */
ALTER TABLE participants
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* personarticles */
ALTER TABLE personarticles
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* personphotos */
ALTER TABLE personphotos
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* persons */
ALTER TABLE persons
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* photos */
ALTER TABLE photos
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* pitching */
ALTER TABLE pitching
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* relations */
ALTER TABLE relations
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* roles */
ALTER TABLE roles
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* rosters */
ALTER TABLE rosters
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* sources */
ALTER TABLE sources
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* teams */
ALTER TABLE teams
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 
/* videos */
ALTER TABLE videos
    ADD created_at TIMESTAMP NULL AFTER dtprevmut, 
    ADD updated_by VARCHAR(50) NULL AFTER created_at, 
    ADD updated_at TIMESTAMP NULL AFTER updated_by; 

/* insert the correct values */
/* articlephotos */
UPDATE articlephotos SET updated_by = nmlastmut;
UPDATE articlephotos SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE articlephotos SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* articles */
UPDATE articles SET updated_by = nmlastmut;
UPDATE articles SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE articles SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* clubs */
UPDATE clubs SET updated_by = nmlastmut;
UPDATE clubs SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE clubs SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* competitions */
UPDATE competitions SET updated_by = nmlastmut;
UPDATE competitions SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE competitions SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* fielding */
UPDATE fielding SET updated_by = nmlastmut;
UPDATE fielding SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE fielding SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* games */
UPDATE games SET updated_by = nmlastmut;
UPDATE games SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE games SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* hitting */
UPDATE hitting SET updated_by = nmlastmut;
UPDATE hitting SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE hitting SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* lineups */
UPDATE lineups SET updated_by = nmlastmut;
UPDATE lineups SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE lineups SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* participants */
UPDATE participants SET updated_by = nmlastmut;
UPDATE participants SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE participants SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* personarticles */
UPDATE personarticles SET updated_by = nmlastmut;
UPDATE personarticles SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE personarticles SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* personphotos */
UPDATE personphotos SET updated_by = nmlastmut;
UPDATE personphotos SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE personphotos SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* persons */
UPDATE persons SET updated_by = nmlastmut;
UPDATE persons SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE persons SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* photos */
UPDATE photos SET updated_by = nmlastmut;
UPDATE photos SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE photos SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* pitching */
UPDATE pitching SET updated_by = nmlastmut;
UPDATE pitching SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE pitching SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* relations */
UPDATE relations SET updated_by = nmlastmut;
UPDATE relations SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE relations SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* roles */
UPDATE roles SET updated_by = nmlastmut;
UPDATE roles SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE roles SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* rosters */
UPDATE rosters SET updated_by = nmlastmut;
UPDATE rosters SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE rosters SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* sources */
UPDATE sources SET updated_by = nmlastmut;
UPDATE sources SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE sources SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* teams */
UPDATE teams SET updated_by = nmlastmut;
UPDATE teams SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE teams SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;
/* videos */
UPDATE videos SET updated_by = nmlastmut;
UPDATE videos SET created_at = dtlastmut WHERE dtprevmut IS NULL;
UPDATE videos SET created_at = dtprevmut, updated_at = dtlastmut WHERE dtprevmut IS NOT NULL;


/* set the mandatory values */
/* articlephotos */
ALTER TABLE articlephotos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE articlephotos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* articles */
ALTER TABLE articles CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE articles CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* clubs */
ALTER TABLE clubs CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE clubs CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* competitions */
ALTER TABLE competitions CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE competitions CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* fielding */
ALTER TABLE fielding CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE fielding CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* games */
ALTER TABLE games CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE games CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* hitting */
ALTER TABLE hitting CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE hitting CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* lineups */
ALTER TABLE lineups CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE lineups CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* participants */
ALTER TABLE participants CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE participants CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* personarticles */
ALTER TABLE personarticles CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE personarticles CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* personphotos */
ALTER TABLE personphotos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE personphotos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* persons */
ALTER TABLE persons CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE persons CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* photos */
ALTER TABLE photos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE photos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* pitching */
ALTER TABLE pitching CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE pitching CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* relations */
ALTER TABLE relations CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE relations CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* roles */
ALTER TABLE roles CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE roles CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* rosters */
ALTER TABLE rosters CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE rosters CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* sources */
ALTER TABLE sources CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE sources CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* teams */
ALTER TABLE teams CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE teams CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
/* videos */
ALTER TABLE videos CHANGE created_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE videos CHANGE updated_by updated_by VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 


/* drop the deprecated elements */
/* articlephotos */
ALTER TABLE articlephotos
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* articles */
ALTER TABLE articles
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* clubs */
ALTER TABLE clubs
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* competitions */
ALTER TABLE competitions
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* fielding */
ALTER TABLE fielding
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* games */
ALTER TABLE games
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* hitting */
ALTER TABLE hitting
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* lineups */
ALTER TABLE lineups
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* participants */
ALTER TABLE participants
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* personarticles */
ALTER TABLE personarticles
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* personphotos */
ALTER TABLE personphotos
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* persons */
ALTER TABLE persons
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* photos */
ALTER TABLE photos
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* pitching */
ALTER TABLE pitching
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* relations */
ALTER TABLE relations
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* roles */
ALTER TABLE roles
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* rosters */
ALTER TABLE rosters
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* sources */
ALTER TABLE sources
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;
/* teams */
ALTER TABLE teams
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut,
  DROP dtcreated;
/* videos */
ALTER TABLE videos
  DROP dtlastmut,
  DROP nmlastmut,
  DROP dtprevmut;

/* post check */
SELECT "Select the tables with existing dtcreated, updated_at, updated_by and created_at columns ";
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'museum' 
AND COLUMN_NAME IN ('dtcreated', 'updated_at', 'updated_by', 'created_at');

SELECT "Select the tables with existing dtlmut, dtlastmut, nmlmut, nmlastmut, featured, dtprevmut and dtcreated columns ";
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'museum' 
AND COLUMN_NAME IN ('dtlmut', 'dtlastmut', 'nmlmut', 'nmlastmut', 'featured', 'dtprevmut', 'dtcreated');
