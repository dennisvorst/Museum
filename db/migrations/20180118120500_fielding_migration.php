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
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idfielding`),";
		$sql .= "KEY `Fielding_1` (`idteam`),";
		$sql .= "KEY `Fielding_2` (`idperson`),";
		$sql .= "KEY `Fielding_3` (`idparticipant`),";
		$sql .= "KEY `Fielding_4` (`idcompetition`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=636 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fielding table';";

    	$count = $this->execute($sql);

		$sql .= "ALTER TABLE fielding ADD CONSTRAINT `Fielding_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;";

    	$count = $this->execute($sql);

		$sql .= "ALTER TABLE fielding ADD CONSTRAINT `Fielding_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;";

    	$count = $this->execute($sql);

		$sql .= "ALTER TABLE fielding ADD CONSTRAINT `Fielding_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;";

    	$count = $this->execute($sql);

		$sql .= "ALTER TABLE fielding ADD CONSTRAINT `Fielding_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;";

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
