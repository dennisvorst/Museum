ALTER TABLE `clubretired`
  DROP CONSTRAINT `clubretired_ibfk_1`;

ALTER TABLE `games`
  DROP CONSTRAINT `games_ibfk_1`,
  DROP CONSTRAINT `games_ibfk_2`;

ALTER TABLE `hitting`
  DROP CONSTRAINT `Hitting_3`;

ALTER TABLE `participants`
  DROP CONSTRAINT `participants_ibfk_1`;

ALTER TABLE `articlephotos`
  ADD CONSTRAINT `ArticlePhotos_2` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);
