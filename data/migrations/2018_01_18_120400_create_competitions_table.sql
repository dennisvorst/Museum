CREATE TABLE IF NOT EXISTS `competitions` (
  `idcompetition` int(11) NOT NULL AUTO_INCREMENT,
  `idorganizer` int(11) DEFAULT NULL,
  `nrorder` int(2) NOT NULL,
  `nmcompetition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nmsub` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nryear` int(4) DEFAULT NULL,
  `cdsport` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdclass` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdgender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtstart` date NOT NULL,
  `dtend` date NOT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idcompetition`),
  KEY `idorganizer` (`idorganizer`)
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Competitions table';

ALTER TABLE competitions ADD FOREIGN KEY (idorganizer) REFERENCES `clubs` (`idclub`);