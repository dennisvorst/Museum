<?php


use Phinx\Migration\AbstractMigration;

class PersonsMigration extends AbstractMigration
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
    	$sql = "CREATE TABLE IF NOT EXISTS `persons` (";
    	$sql .= "`idperson` int(11) NOT NULL AUTO_INCREMENT,";
    	$sql .= "`nmfirst` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmfull` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmsur` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmlast` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmnick` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`cdgender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`dtbirth` date DEFAULT NULL,";
    	$sql .= "`nmbirthplace` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`cdcountry` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`dtdeath` date DEFAULT NULL,";
    	$sql .= "`nmdeathplace` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`hasdied` tinyint(1) NOT NULL DEFAULT '0',";
    	$sql .= "`nmaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmpostal` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`nmcity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`ftphone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`ftcell` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`ftemail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`dthof` date DEFAULT NULL,";
    	$sql .= "`cdthrows` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`cdbats` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`cdsubscr` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`dtsend` date DEFAULT NULL,";
    	$sql .= "`idclub` int(11) DEFAULT NULL,";
    	$sql .= "`nmclubstart` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`ftbiography` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,";
    	$sql .= "`is_featured` tinyint(1) DEFAULT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`updated_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`updated_at` timestamp NULL DEFAULT NULL,";

    	$sql .= "PRIMARY KEY (`idperson`)";
    	$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=1063 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Persons table';";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('persons')->drop()->save();
    }
}
