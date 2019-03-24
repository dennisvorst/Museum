<?php


use Phinx\Migration\AbstractMigration;

class UsersMigration extends AbstractMigration
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

		$sql = "CREATE TABLE `users` (";
		$sql .= "`iduser` int(11) NOT NULL,";
		$sql .= "`nmuser` varchar(20) NOT NULL,";
		$sql .= "`ftemail` varchar(150) NOT NULL,";
		$sql .= "`nmpassword` varchar(20) NOT NULL,";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`changed_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`changed_at` timestamp NULL DEFAULT NULL";

		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User table';";

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
