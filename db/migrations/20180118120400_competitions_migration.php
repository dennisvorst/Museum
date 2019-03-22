<?php


use Phinx\Migration\AbstractMigration;

class CompetitionsMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `competitions` (";
		$sql .= "`idcompetition` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idorganizer` int(11) DEFAULT NULL,";
		$sql .= "`nrorder` int(2) NOT NULL,";
		$sql .= "`nmcompetition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nmsub` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`nryear` int(4) DEFAULT NULL,";
		$sql .= "`cdsport` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`cdclass` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`cdgender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`dtstart` date NOT NULL,";
		$sql .= "`dtend` date NOT NULL,";
		$sql .= "`featured` tinyint(1) DEFAULT NULL,";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idcompetition`),";
		$sql .= "KEY `idorganizer` (`idorganizer`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Competitions table';";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE competitions ADD FOREIGN KEY (idorganizer) REFERENCES `clubs` (`idclub`);";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('competitions')->drop()->save();
    }
}
