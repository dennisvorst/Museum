<?php


use Phinx\Migration\AbstractMigration;

class ClubretiredMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `clubretired` (";
		$sql .= "`idretired` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idclub` int(11) NOT NULL,";
		$sql .= "`idperson` int(11) NOT NULL,";
		$sql .= "`nrjersey` int(3) NOT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`updated_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`updated_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idretired`),";
		$sql .= "KEY `ClubRetired_2` (`idperson`),";
		$sql .= "KEY `ClubRetired_1` (`idclub`)";
		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('clubretired')->drop()->save();
    }
}
