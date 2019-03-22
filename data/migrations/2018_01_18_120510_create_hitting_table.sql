CREATE TABLE IF NOT EXISTS `hitting` (
  `idhitting` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) DEFAULT NULL,
  `idteam` int(11) DEFAULT NULL,
  `idparticipant` int(11) DEFAULT NULL,
  `idcompetition` int(11) DEFAULT NULL,
  `nryear` int(4) DEFAULT NULL,
  `nravg` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrgp` int(3) DEFAULT NULL,
  `nrgs` int(3) DEFAULT NULL,
  `nrab` int(3) DEFAULT NULL,
  `nrr` int(3) DEFAULT NULL,
  `nrh` int(3) DEFAULT NULL,
  `nr2b` int(3) DEFAULT NULL,
  `nr3b` int(3) DEFAULT NULL,
  `nrhr` int(3) DEFAULT NULL,
  `nrrbi` int(3) DEFAULT NULL,
  `nrtb` int(3) DEFAULT NULL,
  `nrslgperc` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrbb` int(3) DEFAULT NULL,
  `nrhbp` int(3) DEFAULT NULL,
  `nrso` int(3) DEFAULT NULL,
  `nrgdp` int(3) DEFAULT NULL,
  `nrobperc` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrsf` int(3) DEFAULT NULL,
  `nrsh` int(3) DEFAULT NULL,
  `nrsb` int(3) DEFAULT NULL,
  `nratt` int(3) DEFAULT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idhitting`),
  KEY `Hitting_1` (`idteam`),
  KEY `Hitting_2` (`idperson`),
  KEY `Hitting_3` (`idparticipant`),
  KEY `Hitting_4` (`idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Hitting table';

ALTER TABLE fielding ADD CONSTRAINT `Hitting_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE fielding ADD CONSTRAINT `Hitting_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE fielding ADD CONSTRAINT `Hitting_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE fielding ADD CONSTRAINT `Hitting_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;