CREATE TABLE IF NOT EXISTS `rosters` (
  `idroster` int(11) NOT NULL AUTO_INCREMENT,
  `idcompetition` int(11) NOT NULL DEFAULT '0',
  `idparticipant` int(11) NOT NULL DEFAULT '0',
  `idperson` int(11) NOT NULL DEFAULT '0',
  `cdrole` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idroster`),
  KEY `idcompetition` (`idcompetition`),
  KEY `idparticipant` (`idparticipant`),
  KEY `idperson` (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE rosters ADD CONSTRAINT `Rosters_1` FOREIGN KEY (idcompetition) REFERENCES `competitions`(`idcompetition`);
ALTER TABLE rosters ADD CONSTRAINT `Rosters_2` FOREIGN KEY (idparticipant) REFERENCES `teams`(`idteam`) ;
ALTER TABLE rosters ADD CONSTRAINT `Rosters_3` FOREIGN KEY (idperson) REFERENCES `persons`(`idperson`);
