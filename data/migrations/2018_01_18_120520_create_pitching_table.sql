CREATE TABLE IF NOT EXISTS `pitching` (
  `idpitching` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) DEFAULT NULL,
  `idteam` int(11) DEFAULT NULL,
  `idparticipant` int(11) DEFAULT NULL,
  `idcompetition` int(11) DEFAULT NULL,
  `nryear` int(4) DEFAULT NULL,
  `nrw` int(3) DEFAULT NULL,
  `nrl` int(3) DEFAULT NULL,
  `nrapp` int(3) DEFAULT NULL,
  `nrgs` int(3) DEFAULT NULL,
  `nrcg` int(3) DEFAULT NULL,
  `nrsho` int(3) DEFAULT NULL,
  `nrsv` int(3) DEFAULT NULL,
  `nrip` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrh` int(3) DEFAULT NULL,
  `nrr` int(3) DEFAULT NULL,
  `nrer` int(3) DEFAULT NULL,
  `nrbb` int(3) DEFAULT NULL,
  `nrso` int(3) DEFAULT NULL,
  `nr2b` int(3) DEFAULT NULL,
  `nr3b` int(3) DEFAULT NULL,
  `nrhr` int(3) DEFAULT NULL,
  `nrab` int(3) DEFAULT NULL,
  `nroppavg` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrwp` int(3) DEFAULT NULL,
  `nrhbp` int(3) DEFAULT NULL,
  `nrbk` int(3) DEFAULT NULL,
  `nrera` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idpitching`),
  KEY `Pitching_1` (`idteam`),
  KEY `Pitching_2` (`idperson`),
  KEY `Pitching_3` (`idparticipant`),
  KEY `Pitching_4` (`idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Pitching table';

ALTER TABLE fielding ADD CONSTRAINT `Pitching_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE fielding ADD CONSTRAINT `Pitching_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE fielding ADD CONSTRAINT `Pitching_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE fielding ADD CONSTRAINT `Pitching_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;