<?php


use Phinx\Migration\AbstractMigration;

class HittingMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `hitting` (";
		$sql .= "`idhitting` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idperson` int(11) DEFAULT NULL,";
		$sql .= "`idteam` int(11) DEFAULT NULL,";
		$sql .= "`idparticipant` int(11) DEFAULT NULL,";
		$sql .= "`idcompetition` int(11) DEFAULT NULL,";
		$sql .= "`nryear` int(4) DEFAULT NULL,";
		$sql .= "`nravg` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrgp` int(3) DEFAULT NULL,";
		$sql .= "`nrgs` int(3) DEFAULT NULL,";
		$sql .= "`nrab` int(3) DEFAULT NULL,";
		$sql .= "`nrr` int(3) DEFAULT NULL,";
		$sql .= "`nrh` int(3) DEFAULT NULL,";
		$sql .= "`nr2b` int(3) DEFAULT NULL,";
		$sql .= "`nr3b` int(3) DEFAULT NULL,";
		$sql .= "`nrhr` int(3) DEFAULT NULL,";
		$sql .= "`nrrbi` int(3) DEFAULT NULL,";
		$sql .= "`nrtb` int(3) DEFAULT NULL,";
		$sql .= "`nrslgperc` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrbb` int(3) DEFAULT NULL,";
		$sql .= "`nrhbp` int(3) DEFAULT NULL,";
		$sql .= "`nrso` int(3) DEFAULT NULL,";
		$sql .= "`nrgdp` int(3) DEFAULT NULL,";
		$sql .= "`nrobperc` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nrsf` int(3) DEFAULT NULL,";
		$sql .= "`nrsh` int(3) DEFAULT NULL,";
		$sql .= "`nrsb` int(3) DEFAULT NULL,";
		$sql .= "`nratt` int(3) DEFAULT NULL,";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idhitting`),";
		$sql .= "KEY `Hitting_1` (`idteam`),";
		$sql .= "KEY `Hitting_2` (`idperson`),";
		$sql .= "KEY `Hitting_3` (`idparticipant`),";
		$sql .= "KEY `Hitting_4` (`idcompetition`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Hitting table';";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE fielding ADD CONSTRAINT `Hitting_1` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE fielding ADD CONSTRAINT `Hitting_2` FOREIGN KEY (idperson) REFERENCES `persons` (`idperson`) ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE fielding ADD CONSTRAINT `Hitting_3` FOREIGN KEY (idparticipant) REFERENCES `participants` (`idparticipant`) ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE fielding ADD CONSTRAINT `Hitting_4` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;";

    	$count = $this->execute($sql);
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('hitting')->drop()->save();
    }
}
