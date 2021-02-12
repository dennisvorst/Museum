ALTER TABLE `articles` DROP FOREIGN KEY `ArticleSource_1`;

ALTER TABLE `clubarticles` DROP FOREIGN KEY `ClubArticles_1`;
ALTER TABLE `clubarticles` DROP FOREIGN KEY `ClubArticles_2`;

ALTER TABLE `clubphotos` DROP FOREIGN KEY `ClubPhotos_1`;
ALTER TABLE `clubphotos` DROP FOREIGN KEY `ClubPhotos_2`;

ALTER TABLE `clubretired` DROP FOREIGN KEY `ClubRetired_1`;
ALTER TABLE `clubretired` DROP FOREIGN KEY `ClubRetired_2`;

ALTER TABLE `clubvideos` DROP FOREIGN KEY `ClubVideos_1`;
ALTER TABLE `clubvideos` DROP FOREIGN KEY `ClubVideos_2`;

ALTER TABLE `competitions` DROP FOREIGN KEY `competitions_ibfk_1`;

ALTER TABLE `fielding` DROP FOREIGN KEY `Fielding_1`;
ALTER TABLE `fielding` DROP FOREIGN KEY `Fielding_2`;

ALTER TABLE `games` DROP FOREIGN KEY `Games_1`;

ALTER TABLE `hitting` DROP FOREIGN KEY `Hitting_1`;
ALTER TABLE `hitting` DROP FOREIGN KEY `Hitting_2`;
ALTER TABLE `hitting` DROP FOREIGN KEY `Hitting_3`;

ALTER TABLE `lineups` DROP FOREIGN KEY `Lineups_1`;

ALTER TABLE `participants` DROP FOREIGN KEY `Participants_1`;
ALTER TABLE `participants` DROP FOREIGN KEY `Participants_2`;
ALTER TABLE `participants` DROP FOREIGN KEY `participants_ibfk_1`;

ALTER TABLE `personaliases` DROP FOREIGN KEY `PersonAliases_2`;

ALTER TABLE `personarticles` DROP FOREIGN KEY `PersonArticles_1`;
ALTER TABLE `personarticles` DROP FOREIGN KEY `PersonArticles_2`;

ALTER TABLE `personphotos` DROP FOREIGN KEY `PersonPhotos_2`;

ALTER TABLE `personvideos` DROP FOREIGN KEY `PersonVideos_1`;
ALTER TABLE `personvideos` DROP FOREIGN KEY `PersonVideos_2`;

ALTER TABLE `photos` DROP FOREIGN KEY `Photos_1`;

ALTER TABLE `pitching` DROP FOREIGN KEY `Pitching_1`;
ALTER TABLE `pitching` DROP FOREIGN KEY `Pitching_2`;

ALTER TABLE `roles` DROP FOREIGN KEY `Roles_1`;
ALTER TABLE `roles` DROP FOREIGN KEY `Roles_2`;


ALTER TABLE `clubretired` DROP FOREIGN KEY `clubretired_ibfk_1`;
ALTER TABLE `games` DROP FOREIGN KEY `games_ibfk_1`;
ALTER TABLE `games` DROP FOREIGN KEY `games_ibfk_2`;
ALTER TABLE `lineups` DROP FOREIGN KEY `Lineups_2`;
ALTER TABLE `rosters` DROP FOREIGN KEY `Rosters_1`;
ALTER TABLE `rosters` DROP FOREIGN KEY `Rosters_3`;
ALTER TABLE `rosters` DROP FOREIGN KEY `rosters_ibfk_1`;

ALTER TABLE `articlephotos` DROP FOREIGN KEY `ArticlePhotos_1`;