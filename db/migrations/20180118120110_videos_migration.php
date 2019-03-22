<?php


use Phinx\Migration\AbstractMigration;

class VideosMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `videos` (";
		$sql .= "`idvideo` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`nmvideo` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Title of the video',";
		$sql .= "`nmurl` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Url at youtube',";
		$sql .= "`ftdepicted` text COLLATE utf8_unicode_ci NOT NULL,";
		$sql .= "`featured` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
		$sql .= "`dtprevmut` datetime,";
		$sql .= "PRIMARY KEY (`idvideo`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('videos')->drop()->save();
    }
}
