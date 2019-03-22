CREATE TABLE IF NOT EXISTS `articles` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `idsource` int(11) NOT NULL DEFAULT '0',
  `dtpublish` date DEFAULT NULL COMMENT 'Date of publication',
  `nryear` year(4) NOT NULL COMMENT 'Year of publication',
  `nmauthor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name of the author',
  `fttitle1` text COLLATE utf8_unicode_ci COMMENT 'Main title',
  `fttitle2` text COLLATE utf8_unicode_ci,
  `fttitle3` text COLLATE utf8_unicode_ci,
  `cdtype` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ftarticle` longtext COLLATE utf8_unicode_ci,
  `featured` tinyint(3) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unknown@honkbalmuseum.nl',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idarticle`),
  KEY `idbron` (`idsource`)
) ENGINE=InnoDB AUTO_INCREMENT=30042 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE articles ADD CONSTRAINT `ArticleSource_1` FOREIGN KEY (idsource) REFERENCES `sources`(`idsource`);
