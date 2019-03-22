<?php


use Phinx\Migration\AbstractMigration;

class PhotosMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `photos` (";
		$sql .= "`idphoto` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idsource` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`nmphotographer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrorder` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nryear` int(4) DEFAULT NULL,";
		$sql .= "`dtpublish` date DEFAULT NULL,";
		$sql .= "`idoriginal` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`idmugshot` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`idaction` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`idteamphoto` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`ftdepicted` text COLLATE utf8_unicode_ci,";
		$sql .= "`ftdescription` text COLLATE utf8_unicode_ci,";
		$sql .= "`featured` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idphoto`),";
		$sql .= "KEY `idbron` (`idsource`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=3100171 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Photo data';";

    	$count = $this->execute($sql);

		$sql .= "ALTER TABLE photos ADD CONSTRAINT `PhotoSource_1` FOREIGN KEY (idsource) REFERENCES `sources`(`idsource`);";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('photos')->drop()->save();
    }
}
