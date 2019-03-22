CREATE TABLE IF NOT EXISTS `personarticles` (
  `idarticleperson` int(11) NOT NULL AUTO_INCREMENT,
  `idarticle` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `cdmanually` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idarticleperson`),
  KEY `PersonArticles_1` (`idperson`),
  KEY `PersonArticles_2` (`idarticle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE personarticles ADD CONSTRAINT `PersonArticles_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE personarticles ADD CONSTRAINT `PersonArticles_2` FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`);
