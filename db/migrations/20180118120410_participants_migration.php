<?php


use Phinx\Migration\AbstractMigration;

class ParticipantsMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `participants` (";
		$sql .= "`idparticipant` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idcompetition` int(11) DEFAULT NULL,";
		$sql .= "`idteam` int(11) NOT NULL,";
		$sql .= "`ischampion` tinyint(1) NOT NULL DEFAULT '0',";
		$sql .= "`nrgames` int(3) DEFAULT NULL,";
		$sql .= "`nrgames_calc` int(3) DEFAULT NULL,";
		$sql .= "`nrwins` int(3) DEFAULT NULL,";
		$sql .= "`nrwins_calc` int(3) DEFAULT NULL,";
		$sql .= "`nrlosses` int(3) DEFAULT NULL,";
		$sql .= "`nrlosses_calc` int(3) DEFAULT NULL,";
		$sql .= "`nrdraws` int(3) DEFAULT NULL,";
		$sql .= "`nrdraws_calc` int(3) DEFAULT NULL,";
		$sql .= "`nrrunsscored` int(3) DEFAULT NULL,";
		$sql .= "`nrrunsscored_calc` int(3) DEFAULT NULL,";
		$sql .= "`nrrunsagainst` int(3) DEFAULT NULL,";
		$sql .= "`nrrunsagainst_calc` int(3) DEFAULT NULL,";
		$sql .= "`fttext` longtext COLLATE utf8_unicode_ci,";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idparticipant`),";
		$sql .= "KEY `Participants_1` (`idcompetition`),";
		$sql .= "KEY `Participants_2` (`idteam`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Participants table';";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE participants ADD CONSTRAINT `Participants_1` FOREIGN KEY (idcompetition) REFERENCES `competitions` (`idcompetition`) ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE participants ADD CONSTRAINT `Participants_2` FOREIGN KEY (idteam) REFERENCES `teams` (`idteam`) ;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('participants')->drop()->save();
    }
}
