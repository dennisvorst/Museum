<?php


use Phinx\Migration\AbstractMigration;

class RostersMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `rosters` (";
		$sql .= "`idroster` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idcompetition` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`idparticipant` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`idperson` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`cdrole` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P',";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idroster`),";
		$sql .= "KEY `idcompetition` (`idcompetition`),";
		$sql .= "KEY `idparticipant` (`idparticipant`),";
		$sql .= "KEY `idperson` (`idperson`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE rosters ADD CONSTRAINT `Rosters_1` FOREIGN KEY (idcompetition) REFERENCES `competitions`(`idcompetition`);";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE rosters ADD CONSTRAINT `Rosters_2` FOREIGN KEY (idparticipant) REFERENCES `teams`(`idteam`) ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE rosters ADD CONSTRAINT `Rosters_3` FOREIGN KEY (idperson) REFERENCES `persons`(`idperson`);";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('rosters')->drop()->save();
    }
}
