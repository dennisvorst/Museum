<?php


use Phinx\Migration\AbstractMigration;

class PitchingMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `pitching` (";
		$sql .= "`idpitching` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idperson` int(11) DEFAULT NULL,";
		$sql .= "`idteam` int(11) DEFAULT NULL,";
		$sql .= "`idparticipant` int(11) DEFAULT NULL,";
		$sql .= "`idcompetition` int(11) DEFAULT NULL,";
		$sql .= "`nryear` int(4) DEFAULT NULL,";
		$sql .= "`nrw` int(3) DEFAULT NULL,";
		$sql .= "`nrl` int(3) DEFAULT NULL,";
		$sql .= "`nrapp` int(3) DEFAULT NULL,";
		$sql .= "`nrgs` int(3) DEFAULT NULL,";
		$sql .= "`nrcg` int(3) DEFAULT NULL,";
		$sql .= "`nrsho` int(3) DEFAULT NULL,";
		$sql .= "`nrsv` int(3) DEFAULT NULL,";
		$sql .= "`nrip` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrh` int(3) DEFAULT NULL,";
		$sql .= "`nrr` int(3) DEFAULT NULL,";
		$sql .= "`nrer` int(3) DEFAULT NULL,";
		$sql .= "`nrbb` int(3) DEFAULT NULL,";
		$sql .= "`nrso` int(3) DEFAULT NULL,";
		$sql .= "`nr2b` int(3) DEFAULT NULL,";
		$sql .= "`nr3b` int(3) DEFAULT NULL,";
		$sql .= "`nrhr` int(3) DEFAULT NULL,";
		$sql .= "`nrab` int(3) DEFAULT NULL,";
		$sql .= "`nroppavg` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrwp` int(3) DEFAULT NULL,";
		$sql .= "`nrhbp` int(3) DEFAULT NULL,";
		$sql .= "`nrbk` int(3) DEFAULT NULL,";
		$sql .= "`nrera` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idpitching`),";
		$sql .= "KEY `Pitching_1` (`idteam`),";
		$sql .= "KEY `Pitching_2` (`idperson`),";
		$sql .= "KEY `Pitching_3` (`idparticipant`),";
		$sql .= "KEY `Pitching_4` (`idcompetition`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Pitching table';";

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
