/*
This script is intended to correct the errors in the nmlastmut, dtlastmut en dtprevmut fields. 
*/

/*
 rename the DTLMUT in fielding, hitting and pitching 
 SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and (COLUMN_NAME = 'dtlmut' or COLUMN_NAME = 'nmlmut' or COLUMN_NAME = 'featured') order by COLUMN_NAME 
 */

/* Change the HITTING table. */
ALTER TABLE hitting CHANGE dtlmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE hitting CHANGE nmlmut nmlastmut VARCHAR(50)  NOT NULL;
ALTER TABLE hitting CHANGE dtprevmut dtprevmut TIMESTAMP NULL;

/* Change the PITCHING table. */
ALTER TABLE pitching CHANGE dtlmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE pitching CHANGE nmlmut nmlastmut VARCHAR(50)  NOT NULL;
ALTER TABLE pitching CHANGE dtprevmut dtprevmut TIMESTAMP NULL;

/* Change the FIELDING table. */
ALTER TABLE fielding CHANGE dtlmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE fielding CHANGE nmlmut nmlastmut VARCHAR(50)  NOT NULL;
ALTER TABLE fielding CHANGE dtprevmut dtprevmut TIMESTAMP NULL;

/* update the dtlastmut values */
UPDATE articles SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE articlephotos SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE clubs SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE competitions SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE participants SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE personarticles SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE persons SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;
UPDATE personphotos SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00";
UPDATE photos SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;
UPDATE rosters SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;
UPDATE sources SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;
UPDATE teams SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;
UPDATE videos SET dtlastmut = "2007-08-25" WHERE dtlastmut = "0000-00-00" OR dtlastmut = NULL;

/* update the dtprevmut values */
UPDATE articles SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE articlephotos SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE clubs SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE competitions SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE participants SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE personarticles SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE persons SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE personphotos SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE photos SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE rosters SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE sources SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE teams SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE videos SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE fielding SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE games SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE hitting SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";
UPDATE pitching SET dtprevmut = NULL WHERE dtprevmut = "0000-00-00";

/* 
update the nmlastmut 
SELECT table_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and COLUMN_NAME = 'nmlastmut'
*/
UPDATE articlephotos SET nmlastmut = "ADMIN";
UPDATE articles SET nmlastmut = "ADMIN";
UPDATE clubs SET nmlastmut = "ADMIN";
UPDATE competitions SET nmlastmut = "ADMIN";
UPDATE games SET nmlastmut = "ADMIN";
UPDATE lineups SET nmlastmut = "ADMIN";
UPDATE participants SET nmlastmut = "ADMIN";
UPDATE personarticles SET nmlastmut = "ADMIN";
UPDATE personphotos SET nmlastmut = "ADMIN";
UPDATE persons SET nmlastmut = "ADMIN";
UPDATE photos SET nmlastmut = "ADMIN";
UPDATE relations SET nmlastmut = "ADMIN";
UPDATE roles SET nmlastmut = "ADMIN";
UPDATE rosters SET nmlastmut = "ADMIN";
UPDATE sources SET nmlastmut = "ADMIN";
UPDATE teams SET nmlastmut = "ADMIN";
UPDATE videos SET nmlastmut = "ADMIN";


/* 
fix the dtprevmut datatypes 
SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and COLUMN_NAME = 'dtprevmut'  and data_type != "timestamp"
*/
ALTER TABLE articles CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE articlephotos CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE clubs CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE competitions CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE games CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE lineups CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE participants CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE personarticles CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE persons CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE personphotos CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE photos CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE relations CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE roles CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE rosters CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE sources CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE teams CHANGE dtprevmut dtprevmut TIMESTAMP NULL;
ALTER TABLE videos CHANGE dtprevmut dtprevmut TIMESTAMP NULL;

/*
update the dtlastmut
SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'museum' and COLUMN_NAME = 'dtlastmut'
*/
ALTER TABLE articlephotos CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE articles CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE clubs CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE competitions CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE fielding CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE games CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE hitting CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE lineups CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE participants CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE personarticles CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE personphotos CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE persons CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE photos CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE pitching CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE relations CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE roles CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE rosters CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE sources CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE teams CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE videos CHANGE dtlastmut dtlastmut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

/*
update the nmlmut properties 
*/
ALTER TABLE articlephotos CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE articles CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE clubs CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE competitions CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE fielding CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE games CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE hitting CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE lineups CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE participants CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE personarticles CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE personphotos CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE persons CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE photos CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE pitching CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE relations CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE roles CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE rosters CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE sources CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE teams CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;
ALTER TABLE videos CHANGE nmlastmut nmlastmut VARCHAR(50) NOT NULL;

/*
update the featured properties 
*/
ALTER TABLE articles CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE clubs CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE competitions CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE persons CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE photos CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE teams CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE videos CHANGE featured is_featured TINYINT(3) NOT NULL DEFAULT '0';