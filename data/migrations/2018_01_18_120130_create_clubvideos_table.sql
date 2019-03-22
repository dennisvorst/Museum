CREATE TABLE IF NOT EXISTS `clubvideos` (
  `idclubvideo` int(11) NOT NULL AUTO_INCREMENT,
  `idclub` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL,
  `cdmanually` tinyint(1) NOT NULL DEFAULT '0',
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',  
  PRIMARY KEY (`idclubvideo`),
  KEY `ClubVideos_1` (`idvideo`),
  KEY `ClubVideos_2` (`idclub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_1` FOREIGN KEY (`idvideo`) REFERENCES `videos` (`idvideo`);
ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_2` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);