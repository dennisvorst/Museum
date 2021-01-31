ALTER TABLE articles CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE clubs CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE competitions CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE persons CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE photos CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE teams CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 
ALTER TABLE videos CHANGE is_featured is_featured TINYINT(1) NOT NULL DEFAULT '0'; 