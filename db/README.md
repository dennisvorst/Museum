# Building the Museum database 

We are misusing the seed and migration functions of Phinx to fill the databases with production data. In the following section the steps to complete the database setup are mentioned.

## Setup
1. Drop the database 
...
drop database museum_dev;
...
2. Create a new database 
...
create database museum_dev;
...
3. Run the Phinx migration 
Open a command window and in the project's root enter:
...
vendor\bin\phinx migrate
...
4. Run the Phinx seed 
Open a command window and in the project's root enter:
...
vendor\bin\phinx seed:run
...
5. Add constraints to the database
...
/*halloffamers*/
ALTER TABLE halloffamers ADD CONSTRAINT `HallOfFamers_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE halloffamers ADD CONSTRAINT `HallOfFamers_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);

/*photos*/
ALTER TABLE photos ADD CONSTRAINT `PhotoSource_1` FOREIGN KEY (idsource) REFERENCES `sources`(`idsource`);

/*articles*/
ALTER TABLE articles ADD CONSTRAINT `ArticleSource_1` FOREIGN KEY (idsource) REFERENCES `sources`(`idsource`);

/*personaliases*/
ALTER TABLE personaliases ADD CONSTRAINT `PersonAliases_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);

/*pitching*/
ALTER TABLE pitching ADD CONSTRAINT `Pitching_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE pitching ADD CONSTRAINT `Pitching_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE pitching ADD CONSTRAINT `Pitching_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE pitching ADD CONSTRAINT `Pitching_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;

/*hitting*/
ALTER TABLE hitting ADD CONSTRAINT `Hitting_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE hitting ADD CONSTRAINT `Hitting_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE hitting ADD CONSTRAINT `Hitting_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE hitting ADD CONSTRAINT `Hitting_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;

/*fielding*/
ALTER TABLE fielding ADD CONSTRAINT `Fielding_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE fielding ADD CONSTRAINT `Fielding_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;

/*rosters*/
ALTER TABLE rosters ADD CONSTRAINT `Rosters_1` FOREIGN KEY (idcompetition) REFERENCES `competitions`(`idcompetition`);
ALTER TABLE rosters ADD CONSTRAINT `Rosters_2` FOREIGN KEY (idparticipant) REFERENCES `teams`(`idteam`) ;
ALTER TABLE rosters ADD CONSTRAINT `Rosters_3` FOREIGN KEY (idperson) REFERENCES `persons`(`idperson`);

/*games*/
ALTER TABLE games ADD CONSTRAINT `Games_1` FOREIGN KEY (`idcompetition`) REFERENCES `competitions` (`idcompetition`) ;
ALTER TABLE games ADD CONSTRAINT `Games_2` FOREIGN KEY (`idhome`) REFERENCES `participants` (`idparticipant`) ;
ALTER TABLE games ADD CONSTRAINT `Games_3` FOREIGN KEY (`idaway`) REFERENCES `participants` (`idparticipant`) ;

/*participants*/
ALTER TABLE participants ADD CONSTRAINT `Participants_1` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;
ALTER TABLE participants ADD CONSTRAINT `Participants_2` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;

/*competitions*/
ALTER TABLE competitions ADD FOREIGN KEY (idorganizer) REFERENCES `clubs` (`idclub`);

/*teams*/
ALTER TABLE teams ADD CONSTRAINT `ClubTeams_1` FOREIGN KEY (idclub) REFERENCES `clubs` (`idclub`);

/*personvideos*/
ALTER TABLE `personvideos` ADD CONSTRAINT `PersonVideos_1` FOREIGN KEY (`idvideo`) REFERENCES `videos`(`id`);
ALTER TABLE `personvideos` ADD CONSTRAINT `PersonVideos_2` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);

/*personarticles*/
ALTER TABLE personarticles ADD CONSTRAINT `PersonArticles_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE personarticles ADD CONSTRAINT `PersonArticles_2` FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`);

/*personphotos*/
ALTER TABLE personphotos ADD CONSTRAINT `PersonPhotos_1` FOREIGN KEY (`idperson`) REFERENCES `persons`(`idperson`);
ALTER TABLE personphotos ADD CONSTRAINT `PersonPhotos_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);

/*clubarticles*/
ALTER TABLE `clubarticles` ADD CONSTRAINT `ClubArticles_1` FOREIGN KEY (`idclub`) REFERENCES `clubs`(`idclub`);
ALTER TABLE `clubarticles` ADD CONSTRAINT `ClubArticles_2` FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`);

/*clubphotos*/
ALTER TABLE `clubphotos` ADD CONSTRAINT `ClubPhotos_1` FOREIGN KEY (`idclub`) REFERENCES `clubs`(`idclub`);
ALTER TABLE `clubphotos` ADD CONSTRAINT `ClubPhotos_2` FOREIGN KEY (`idphoto`) REFERENCES `photos`(`idphoto`);

/*articlephotos*/
ALTER TABLE articlephotos ADD CONSTRAINT `PhotoArticlePhotos_1` FOREIGN KEY (idphoto) REFERENCES `photos`(`idphoto`);
ALTER TABLE articlephotos ADD CONSTRAINT `ArticleArticlePhotos_1` FOREIGN KEY (idarticle) REFERENCES `articles`(`idarticle`);

/*clubretired*/
ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_2` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);

/*clubvideos*/
ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_1` FOREIGN KEY (`idvideo`) REFERENCES `videos` (`id`);
ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_2` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);
...


