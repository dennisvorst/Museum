<?php


use Phinx\Migration\AbstractMigration;

class TeamsMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `teams` (";
		$sql .= "`idteam` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idclub` int(11) NOT NULL,";
		$sql .= "`nmteam` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`cdsport` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`cdclass` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`cdgender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`is_featured` tinyint(1) DEFAULT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idteam`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Teams table';";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('teams')->drop()->save();
    }
}
