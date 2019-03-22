CREATE TABLE IF NOT EXISTS `fielding` (
  `idfielding` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) DEFAULT NULL,
  `idteam` int(11) DEFAULT NULL,
  `idparticipant` int(11) DEFAULT NULL,
  `idcompetition` int(11) DEFAULT NULL,
  `nryear` int(4) DEFAULT NULL,
  `nrc` int(3) DEFAULT NULL,
  `nrpo` int(3) DEFAULT NULL,
  `nra` int(3) DEFAULT NULL,
  `nre` int(3) DEFAULT NULL,
  `nrfldperc` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrdp` int(3) DEFAULT NULL,
  `nrsba` int(3) DEFAULT NULL,
  `nrcsb` int(3) DEFAULT NULL,
  `nrsbaperc` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrpb` int(3) DEFAULT NULL,
  `nrci` int(3) DEFAULT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idfielding`),
  KEY `Fielding_1` (`idteam`),
  KEY `Fielding_2` (`idperson`),
  KEY `Fielding_3` (`idparticipant`),
  KEY `Fielding_4` (`idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=636 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fielding table';

ALTER TABLE fielding ADD CONSTRAINT `Fielding_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;