ALTER TABLE `articlephotos`
  ADD CONSTRAINT `articles_articlephotos_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);
ALTER TABLE `clubarticles`
  ADD CONSTRAINT `articles_clubarticles_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);
ALTER TABLE `personarticles`
  ADD CONSTRAINT `articles_personarticles_1` FOREIGN KEY (`idarticle`) REFERENCES `articles` (`idarticle`);

ALTER TABLE `clubretired`
  ADD CONSTRAINT `person_clubretired_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `fielding`
  ADD CONSTRAINT `person_fielding_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `hitting`
  ADD CONSTRAINT `person_hitting_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `personaliases`
  ADD CONSTRAINT `person_personaliases_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `personarticles`
  ADD CONSTRAINT `person_personarticles_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `personphotos`
  ADD CONSTRAINT `person_personphotos_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `personvideos`
  ADD CONSTRAINT `person_personvideos_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `pitching`
  ADD CONSTRAINT `person_pitching_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `roles`
  ADD CONSTRAINT `person_roles_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `rosters`
  ADD CONSTRAINT `person_rosters_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);
ALTER TABLE `relations`
  ADD CONSTRAINT `person_relations_1` FOREIGN KEY (`idperson1`) REFERENCES `persons` (`idperson`);
ALTER TABLE `relations`
  ADD CONSTRAINT `person_relations_2` FOREIGN KEY (`idperson2`) REFERENCES `persons` (`idperson`);

ALTER TABLE `clubarticles`
  ADD CONSTRAINT `clubs_clubarticles_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `clubphotos`
  ADD CONSTRAINT `clubs_clubphotos_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `clubretired`
  ADD CONSTRAINT `clubs_clubretired_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `clubvideos`
  ADD CONSTRAINT `clubs_clubvideos_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `lineups`
  ADD CONSTRAINT `clubs_lineups_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `persons`
  ADD CONSTRAINT `clubs_persons_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `roles`
  ADD CONSTRAINT `clubs_roles_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `teams`
  ADD CONSTRAINT `clubs_teams_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `competitions`
  ADD CONSTRAINT `clubs_competitions_1` FOREIGN KEY (`idorganizer`) REFERENCES `clubs` (`idclub`);

ALTER TABLE `lineups`
  ADD CONSTRAINT `games_lineups_1` FOREIGN KEY (`idgame`) REFERENCES `games` (`idgame`);

ALTER TABLE `games`
  ADD CONSTRAINT `competitions_games_1` FOREIGN KEY (`idcompetition`) REFERENCES `competitions` (`idcompetition`);
ALTER TABLE `participants`
  ADD CONSTRAINT `competitions_participants_1` FOREIGN KEY (`idcompetition`) REFERENCES `competitions` (`idcompetition`);
ALTER TABLE `rosters`
  ADD CONSTRAINT `competitions_rosters_1` FOREIGN KEY (`idcompetition`) REFERENCES `competitions` (`idcompetition`);

ALTER TABLE `rosters`
  ADD CONSTRAINT `participants_rosters_1` FOREIGN KEY (`idparticipant`) REFERENCES `participants` (`idparticipant`);
ALTER TABLE `games`
  ADD CONSTRAINT `games_teams_1` FOREIGN KEY (`idhome`) REFERENCES `participants` (`idparticipant`);
ALTER TABLE `games`
  ADD CONSTRAINT `games_teams_2` FOREIGN KEY (`idaway`) REFERENCES `participants` (`idparticipant`);
