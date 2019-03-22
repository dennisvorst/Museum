CREATE TABLE IF NOT EXISTS `teams` (
  `idteam` int(11) NOT NULL AUTO_INCREMENT,
  `idclub` int(11) NOT NULL,
  `nmteam` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdsport` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdclass` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdgender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idteam`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Teams table';

ALTER TABLE teams ADD CONSTRAINT `ClubTeams_1` FOREIGN KEY (idclub) REFERENCES `clubs` (`idclub`) ;
