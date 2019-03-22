CREATE TABLE IF NOT EXISTS `clubarticles` (
  `idarticleclub` int(11) NOT NULL AUTO_INCREMENT,
  `idarticle` int(11) NOT NULL,
  `idclub` int(11) NOT NULL,
  `cdmanually` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idarticleclub`),
  UNIQUE KEY `idarticle_2` (`idarticle`,`idclub`),
  KEY `ClubArticles_1` (`idclub`),
  KEY `idarticle` (`idarticle`,`idclub`)
) ENGINE=InnoDB AUTO_INCREMENT=19649 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `clubarticles` ADD CONSTRAINT `ClubArticles_1` FOREIGN KEY (`idclub`) REFERENCES `clubs`(`idclub`);
ALTER TABLE `clubarticles` ADD CONSTRAINT `ClubArticles_2` FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`);
