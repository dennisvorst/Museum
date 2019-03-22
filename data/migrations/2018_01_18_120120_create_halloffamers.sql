CREATE TABLE `halloffamers` (
  `id` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `idphoto` int(11) NOT NULL,
  `dthof` date NOT NULL,
  `biography` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY (`idperson`),
  KEY (`idphoto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='HallOfFamers table';

ALTER TABLE halloffamers ADD CONSTRAINT `HallOfFamers_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE halloffamers ADD CONSTRAINT `HallOfFamers_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);