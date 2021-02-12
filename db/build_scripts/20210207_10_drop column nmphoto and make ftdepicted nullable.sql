ALTER TABLE videos DROP IF EXISTS nmphoto;
ALTER TABLE `videos` CHANGE `ftdepicted` `ftdepicted` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL; 