CREATE TABLE IF NOT EXISTS `personphotos` (
  `idpersonphoto` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL DEFAULT '0',
  `idphoto` int(11) NOT NULL DEFAULT '0',
  `cdtype` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdmanually` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idpersonphoto`),
  KEY `PersonPhotos_2` (`idphoto`)
) ENGINE=InnoDB AUTO_INCREMENT=1940 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE personphotos ADD CONSTRAINT `PersonPhotos_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE personphotos ADD CONSTRAINT `PersonPhotos_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);