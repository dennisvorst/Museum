<?php


use Phinx\Migration\AbstractMigration;

class ClubvideosMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    /**
     * Migrate Up.
     */
    public function up()
    {
		$sql = "CREATE TABLE IF NOT EXISTS `clubvideos` (";
		$sql .= "`idclubvideo` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idclub` int(11) NOT NULL,";
		$sql .= "`idvideo` int(11) NOT NULL,";
		$sql .= "`cdmanually` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idclubvideo`),";
		$sql .= "KEY `ClubVideos_1` (`idvideo`),";
		$sql .= "KEY `ClubVideos_2` (`idclub`)";
		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_1` FOREIGN KEY (`idvideo`) REFERENCES `videos` (`idvideo`);";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE `clubvideos` ADD CONSTRAINT `ClubVideos_2` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('clubvideos')->drop()->save();
    }
}
