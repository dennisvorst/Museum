CREATE TABLE IF NOT EXISTS `games` (
  `idgame` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Game id',
  `idcompetition` int(11) DEFAULT NULL COMMENT 'Competition id',
  `idhome` int(11) DEFAULT NULL COMMENT 'Home team',
  `idaway` int(11) DEFAULT NULL COMMENT 'Guests',
  `nrgame` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Game number',
  `dtstart` date DEFAULT NULL COMMENT 'Start date',
  `tmstart` time DEFAULT NULL COMMENT 'Start time',
  `nrrunshome` int(3) DEFAULT NULL COMMENT 'Runs score by home team',
  `nrrunsaway` int(3) DEFAULT NULL COMMENT 'Runs scored by guests',
  `nrinnings` int(3) DEFAULT NULL COMMENT 'Number of innings played',
  `cdstatus` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Status of the game',
  `dtnew` date DEFAULT NULL COMMENT 'New date',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idgame`),
  KEY `Games_1` (`idcompetition`),
  KEY `Games_2` (`idhome`),
  KEY `Games_3` (`idaway`)
) ENGINE=InnoDB AUTO_INCREMENT=2099 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Games table';

ALTER TABLE games ADD CONSTRAINT `Games_1` FOREIGN KEY (`idcompetition`) REFERENCES `competitions` (`idcompetition`) ;
ALTER TABLE games ADD CONSTRAINT `Games_2` FOREIGN KEY (`idhome`) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE games ADD CONSTRAINT `Games_3` FOREIGN KEY (`idaway`) REFERENCES `participants` (`idparticipant`) ;