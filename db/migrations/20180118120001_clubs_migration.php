<?php


use Phinx\Migration\AbstractMigration;

class ClubsMigration extends AbstractMigration
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

  		$sql = "CREATE TABLE IF NOT EXISTS `clubs` (";
  		$sql .= "`idclub` int(11) NOT NULL AUTO_INCREMENT,";
  		$sql .= "`cdstatus` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',";
  		$sql .= "`nmsearch` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`nmclub` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`nmfull` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftlocation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftfield` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftpostalcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmcity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`featured` tinyint(1) NOT NULL DEFAULT '0',";
  		$sql .= "`nmprimarycolor` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmsecondarycolor` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmtertiarycolor` int(11) DEFAULT NULL,";
  		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
  		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
  		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
  		$sql .= "PRIMARY KEY (`idclub`)";
  		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('sources')->drop()->save();
    }
}
