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
		$sql .= "`dtlastmut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',";
		$sql .= "`nmlastmut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,";
		$sql .= "`dtprevmut` datetime DEFAULT NULL,";
		$sql .= "`dtcreated` timestamp NOT NULL DEFAULT '2004-12-31 23:00:00',";
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
