CREATE TABLE IF NOT EXISTS `clubretired` (
  `idretired` int(11) NOT NULL AUTO_INCREMENT,
  `idclub` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `nrjersey` int(3) NOT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idretired`),
  KEY `ClubRetired_2` (`idperson`),
  KEY `ClubRetired_1` (`idclub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_2` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);