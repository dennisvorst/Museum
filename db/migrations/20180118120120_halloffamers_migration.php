<?php


use Phinx\Migration\AbstractMigration;

class HalloffamersMigration extends AbstractMigration
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
		$sql = "CREATE TABLE `halloffamers` (";
		$sql .= "`id` int(11) NOT NULL,";
		$sql .= "`idperson` int(11) NOT NULL,";
		$sql .= "`idphoto` int(11) NOT NULL,";
		$sql .= "`dthof` date NOT NULL,";
		$sql .= "`biography` text NOT NULL,";
		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,";
		$sql .= "`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "PRIMARY KEY (`id`),";
		$sql .= "KEY (`idperson`),";
		$sql .= "KEY (`idphoto`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='HallOfFamers table';";

    	$count = $this->execute($sql);
    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('halloffamers')->drop()->save();
    }
}
