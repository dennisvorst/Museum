<?php


use Phinx\Migration\AbstractMigration;

class PersonaliasesMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `personaliases` (";
		$sql .= "`idalias` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idperson` int(11) NOT NULL,";
		$sql .= "`nmperson` varchar(50) COLLATE utf8_unicode_ci NOT NULL,";
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
		$sql .= "PRIMARY KEY (`idalias`),";
		$sql .= "KEY `PersonAliases_2` (`idperson`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);


		$sql = "ALTER TABLE personaliases ADD CONSTRAINT `PersonAliases_1` FOREIGN KEY (`idperson`) REFERENCES `persons` (`idperson`);";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('personaliases')->drop()->save();
    }
}
