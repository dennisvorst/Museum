<?php


use Phinx\Migration\AbstractMigration;

class GamesMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `games` (";
		$sql .= "`idgame` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Game id',";
		$sql .= "`idcompetition` int(11) DEFAULT NULL COMMENT 'Competition id',";
		$sql .= "`idhome` int(11) DEFAULT NULL COMMENT 'Home team',";
		$sql .= "`idaway` int(11) DEFAULT NULL COMMENT 'Guests',";
		$sql .= "`nrgame` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Game number',";
		$sql .= "`dtstart` date DEFAULT NULL COMMENT 'Start date',";
		$sql .= "`tmstart` time DEFAULT NULL COMMENT 'Start time',";
		$sql .= "`nrrunshome` int(3) DEFAULT NULL COMMENT 'Runs score by home team',";
		$sql .= "`nrrunsaway` int(3) DEFAULT NULL COMMENT 'Runs scored by guests',";
		$sql .= "`nrinnings` int(3) DEFAULT NULL COMMENT 'Number of innings played',";
		$sql .= "`cdstatus` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Status of the game',";
		$sql .= "`dtnew` date DEFAULT NULL COMMENT 'New date',";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idgame`),";
		$sql .= "KEY `Games_1` (`idcompetition`),";
		$sql .= "KEY `Games_2` (`idhome`),";
		$sql .= "KEY `Games_3` (`idaway`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=2099 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Games table';";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('games')->drop()->save();
    }
}
