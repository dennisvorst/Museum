<?php


use Phinx\Migration\AbstractMigration;

class FieldingMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `fielding` (";
		$sql .= "`idfielding` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idperson` int(11) DEFAULT NULL,";
		$sql .= "`idteam` int(11) DEFAULT NULL,";
		$sql .= "`idparticipant` int(11) DEFAULT NULL,";
		$sql .= "`idcompetition` int(11) DEFAULT NULL,";
		$sql .= "`nryear` int(4) DEFAULT NULL,";
		$sql .= "`nrc` int(3) DEFAULT NULL,";
		$sql .= "`nrpo` int(3) DEFAULT NULL,";
		$sql .= "`nra` int(3) DEFAULT NULL,";
		$sql .= "`nre` int(3) DEFAULT NULL,";
		$sql .= "`nrfldperc` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrdp` int(3) DEFAULT NULL,";
		$sql .= "`nrsba` int(3) DEFAULT NULL,";
		$sql .= "`nrcsb` int(3) DEFAULT NULL,";
		$sql .= "`nrsbaperc` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrpb` int(3) DEFAULT NULL,";
		$sql .= "`nrci` int(3) DEFAULT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idfielding`),";
		$sql .= "KEY `Fielding_1` (`idteam`),";
		$sql .= "KEY `Fielding_2` (`idperson`),";
		$sql .= "KEY `Fielding_3` (`idparticipant`),";
		$sql .= "KEY `Fielding_4` (`idcompetition`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=636 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fielding table';";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('fielding')->drop()->save();
    }
}
