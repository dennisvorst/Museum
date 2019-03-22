CREATE TABLE IF NOT EXISTS `videos` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `nmvideo` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Title of the video',
  `nmurl` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Url at youtube',
  `ftdepicted` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime,
  PRIMARY KEY (`idvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;