CREATE TABLE IF NOT EXISTS `participants` (
  `idparticipant` int(11) NOT NULL AUTO_INCREMENT,
  `idcompetition` int(11) DEFAULT NULL,
  `idteam` int(11) NOT NULL,
  `ischampion` tinyint(1) NOT NULL DEFAULT '0',
  `nrgames` int(3) DEFAULT NULL,
  `nrgames_calc` int(3) DEFAULT NULL,
  `nrwins` int(3) DEFAULT NULL,
  `nrwins_calc` int(3) DEFAULT NULL,
  `nrlosses` int(3) DEFAULT NULL,
  `nrlosses_calc` int(3) DEFAULT NULL,
  `nrdraws` int(3) DEFAULT NULL,
  `nrdraws_calc` int(3) DEFAULT NULL,
  `nrrunsscored` int(3) DEFAULT NULL,
  `nrrunsscored_calc` int(3) DEFAULT NULL,
  `nrrunsagainst` int(3) DEFAULT NULL,
  `nrrunsagainst_calc` int(3) DEFAULT NULL,
  `fttext` longtext COLLATE utf8_unicode_ci,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idparticipant`),
  KEY `Participants_1` (`idcompetition`),
  KEY `Participants_2` (`idteam`)
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Participants table';

ALTER TABLE participants ADD CONSTRAINT `Participants_1` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;
ALTER TABLE participants ADD CONSTRAINT `Participants_2` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
