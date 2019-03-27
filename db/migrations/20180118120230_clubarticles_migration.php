<?php


use Phinx\Migration\AbstractMigration;

class ClubarticlesMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `clubarticles` (";
		$sql .= "`idarticleclub` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idarticle` int(11) NOT NULL,";
		$sql .= "`idclub` int(11) NOT NULL,";
		$sql .= "`cdmanually` tinyint(1) NOT NULL DEFAULT '0',";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`updated_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`updated_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idarticleclub`),";
		$sql .= "UNIQUE KEY `idarticle_2` (`idarticle`,`idclub`),";
		$sql .= "KEY `ClubArticles_1` (`idclub`),";
		$sql .= "KEY `idarticle` (`idarticle`,`idclub`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=19649 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('clubarticles')->drop()->save();
    }
}
