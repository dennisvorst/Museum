<?php


use Phinx\Migration\AbstractMigration;

class RolesMigration extends AbstractMigration
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

		$sql = "CREATE TABLE `roles` (";
		$sql .= "`idrole` int(11) NOT NULL,";
		$sql .= "`idperson` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`idclub` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`nryearstart` year(4) NOT NULL DEFAULT '0000',";
		$sql .= "`nryearend` int(4) DEFAULT NULL,";
		$sql .= "`cdrole` varchar(10) NOT NULL DEFAULT '',";
		$sql .= "`ftdescription` text,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL";

		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";

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
