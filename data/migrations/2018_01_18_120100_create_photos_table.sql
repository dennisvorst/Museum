CREATE TABLE IF NOT EXISTS `photos` (
  `idphoto` int(11) NOT NULL AUTO_INCREMENT,
  `idsource` int(11) NOT NULL DEFAULT '0',
  `nmphotographer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrorder` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nryear` int(4) DEFAULT NULL,
  `dtpublish` date DEFAULT NULL,
  `idoriginal` tinyint(1) NOT NULL DEFAULT '0',
  `idmugshot` tinyint(1) NOT NULL DEFAULT '0',
  `idaction` tinyint(1) NOT NULL DEFAULT '0',
  `idteamphoto` tinyint(1) NOT NULL DEFAULT '0',
  `ftdepicted` text COLLATE utf8_unicode_ci,
  `ftdescription` text COLLATE utf8_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idphoto`),
  KEY `idbron` (`idsource`)
) ENGINE=InnoDB AUTO_INCREMENT=3100171 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Photo data';

ALTER TABLE photos ADD CONSTRAINT `PhotoSource_1` FOREIGN KEY (idsource) REFERENCES `sources`(`idsource`);
