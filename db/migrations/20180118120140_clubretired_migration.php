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
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idretired`),";
		$sql .= "KEY `ClubRetired_2` (`idperson`),";
		$sql .= "KEY `ClubRetired_1` (`idclub`)";
		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_1` FOREIGN KEY (`idclub`) REFERENCES `clubs` (`idclub`);";

    	$count = $this->execute($sql);

		$sql = "ALTER TABLE `clubretired` ADD CONSTRAINT `ClubRetired_2` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);";

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
