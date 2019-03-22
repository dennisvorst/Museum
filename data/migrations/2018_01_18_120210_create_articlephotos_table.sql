CREATE TABLE IF NOT EXISTS `articlephotos` (
  `idarticlephoto` int(11) NOT NULL AUTO_INCREMENT,
  `idarticle` int(11) NOT NULL DEFAULT '0',
  `idphoto` int(11) NOT NULL DEFAULT '0',
  `ftdescription` text COLLATE utf8_unicode_ci,
  `dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dtprevmut` datetime DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',
  PRIMARY KEY (`idarticlephoto`),
  KEY `ArticlePhotos_1` (`idphoto`)
) ENGINE=InnoDB AUTO_INCREMENT=2578 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE articlephotos ADD CONSTRAINT `PhotoArticlePhotos_1` FOREIGN KEY (idphoto) REFERENCES `photos`(`idphoto`);
ALTER TABLE articlephotos ADD CONSTRAINT `ArticleArticlePhotos_1` FOREIGN KEY (idarticle) REFERENCES `articles`(`idarticle`);
