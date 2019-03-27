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

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`updated_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`updated_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idroster`),";
		$sql .= "KEY `idcompetition` (`idcompetition`),";
		$sql .= "KEY `idparticipant` (`idparticipant`),";
		$sql .= "KEY `idperson` (`idperson`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

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
