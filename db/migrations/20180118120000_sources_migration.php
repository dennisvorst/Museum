<?php


use Phinx\Migration\AbstractMigration;

class SourcesMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `sources` (";
  		$sql .= "`idsource` int(11) NOT NULL AUTO_INCREMENT,";
  		$sql .= "`nmsearch` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`nmsource` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`nmcontact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmpostal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`nmcity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftcell` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftemail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`ftwebsite` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
  		$sql .= "`cdpermission` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',";
  		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
  		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
  		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
  		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
  		$sql .= "PRIMARY KEY (`idsource`),";
  		$sql .= "KEY `nmzoek` (`nmsearch`,`nmsource`)";
  		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Source data';";

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
