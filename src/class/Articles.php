<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Article.php";
require_once "ListPage.php";
require_once "MenuBar.php";
//require_once "MysqlDatabase.php";
//require_once "Log.php";

class Articles extends ListPage{

	protected $_nmtitle		= "Artikelen";

	protected $_nmtable 		= "articles";
	protected $_nmsingle		= "article";
	var $nmclass 		= "Article";
	protected $_searchFields 	= array("fttitle1", "fttitle2", "fttitle3", "ftarticle", "nmauthor", "ftarticle");
	protected $_orderByFields 	= array("dtpublish");

	var $nrRecordsOnPage = 10;
	var $years;

	/* for the tile list */
	var $nrcolumns = 1;

	/* for pagination purposes we need this variable */
	static $nrcurrentarticlespage = 1;

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);

		/* get a list of years */
		$this->years	= $this->getYears("articles");

		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar($this->_db);
		}
	}


	function getClubArticles($id, $nmCurrentTab, $nrCurrentPage){
		/* get the articles that go with a club
		These are always displayed in a tab page
		*/
		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = ?";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$sql = "SELECT a.* FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = ? ORDER BY a.dtpublish LIMIT ? OFFSET ?";
		$this->_rows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubArticles


	function getPersonArticles($id, $nmCurrentTab, $nrCurrentPage){
		/* get the articles that go with a person */

		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM personarticles ap, articles a WHERE a.idarticle = ap.idarticle AND ap.idperson = ? ORDER BY a.dtpublish";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles */
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$sql = "SELECT a.* FROM personarticles ap, articles a ";
		$sql .= "WHERE a.idarticle = ap.idarticle AND ap.idperson = ?";
		$sql .= " ORDER BY a.dtpublish LIMIT ? OFFSET ?";

		$this->_rows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getPersonArticles

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$sql = "SELECT idarticle, fttitle1 FROM articles ORDER BY fttitle1";
			$rows	= $this->_db->select($sql);

			foreach($rows as $row){
				$this->ftforeignkeys[$row['idarticle']]	= $row['fttitle1'];
			}
		}
		return $this->ftforeignkeys;
	}

}
?>