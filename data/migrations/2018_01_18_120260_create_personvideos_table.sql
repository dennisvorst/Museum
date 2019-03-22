CREATE TABLE IF NOT EXISTS `personvideos` (
  `idpersonvideo` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL,
  `cdmanually` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idpersonvideo`),
  KEY `PersonVideos_1` (`idvideo`),
  KEY `PersonVideos_2` (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `personvideos` ADD CONSTRAINT `PersonVideos_1` FOREIGN KEY (`idvideo`) REFERENCES `videos`(`idvideo`);
ALTER TABLE `personvideos` ADD CONSTRAINT `PersonVideos_2` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
