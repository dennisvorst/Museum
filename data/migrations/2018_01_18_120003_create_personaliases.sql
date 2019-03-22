CREATE TABLE IF NOT EXISTS `personaliases` (
  `idalias` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `nmperson` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idalias`),
  KEY `PersonAliases_2` (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE personaliases ADD CONSTRAINT `PersonAliases_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);