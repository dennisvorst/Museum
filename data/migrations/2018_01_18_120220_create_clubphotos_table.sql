CREATE TABLE IF NOT EXISTS `clubphotos` (
  `idclubphoto` int(11) NOT NULL AUTO_INCREMENT,
  `idclub` int(11) NOT NULL DEFAULT '0',
  `idphoto` int(11) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idclubphoto`),
  KEY `ClubPhotos_1` (`idclub`),
  KEY `ClubPhotos_2` (`idphoto`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `clubphotos` ADD CONSTRAINT `ClubPhotos_1` FOREIGN KEY (`idclub`) REFERENCES `clubs`(`idclub`);
ALTER TABLE `clubphotos` ADD CONSTRAINT `ClubPhotos_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);
