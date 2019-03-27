<?php


use Phinx\Migration\AbstractMigration;

class ArticlesMigration extends AbstractMigration
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
		$sql = "CREATE TABLE IF NOT EXISTS `articles` (";
		$sql .= "`idarticle` int(11) NOT NULL AUTO_INCREMENT,";
		$sql .= "`idsource` int(11) NOT NULL DEFAULT '0',";
		$sql .= "`dtpublish` date DEFAULT NULL COMMENT 'Date of publication',";
		$sql .= "`nryear` year(4) NOT NULL COMMENT 'Year of publication',";
		$sql .= "`nmauthor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name of the author',";
		$sql .= "`fttitle1` text COLLATE utf8_unicode_ci COMMENT 'Main title',";
		$sql .= "`fttitle2` text COLLATE utf8_unicode_ci,";
		$sql .= "`fttitle3` text COLLATE utf8_unicode_ci,";
		$sql .= "`cdtype` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,";
		$sql .= "`ftarticle` longtext COLLATE utf8_unicode_ci,";
		$sql .= "`is_featured` tinyint(3) NOT NULL DEFAULT '0',";

		$sql .= "`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,";
		$sql .= "`updated_by` varchar(50) NOT NULL DEFAULT 'info@honkbalmuseum.nl',";
		$sql .= "`updated_at` timestamp NULL DEFAULT NULL,";

		$sql .= "PRIMARY KEY (`idarticle`),";
		$sql .= "KEY `idbron` (`idsource`)";
		$sql .= ") ENGINE=InnoDB AUTO_INCREMENT=30042 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    	$count = $this->execute($sql);

    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('articles')->drop()->save();
    }
}
