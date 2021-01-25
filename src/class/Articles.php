<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Article.php";
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "MysqlDatabase.php";

class Articles extends ListPage{
	
	var $nmtitle		= "Artikelen";

	var $nmtable 		= "articles";
	var $nmsingle		= "article";
	var $nmclass 		= "Article";
	protected $_searchFields 	= array("fttitle1", "fttitle2", "fttitle3", "ftarticle", "nmauthor", "ftarticle");
	protected $_orderByFields 	= array("dtpublish");

	var $nrRecordsOnPage = 10;
	var $years;

	/* for the tile list */
	var $nrcolumns = 1;

	/* for pagination purposes we need this variable */
	static $nrcurrentarticlespage = 1;

	function __construct(MysqlDatabase $db) {
		parent::__construct($db);

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
		$ftquery = "SELECT count(*) AS nrtotal FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = ?";
		$nrTotPages = $this->_db->select($ftquery, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT a.* FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = ? ORDER BY a.dtpublish LIMIT ? OFFSET ?";
		$this->ftrows = $this->_db->select($ftquery, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubArticles


	function getPersonArticles($id, $nmCurrentTab, $nrCurrentPage){
		/* get the articles that go with a person */

		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM personarticles ap, articles a WHERE a.idarticle = ap.idarticle AND ap.idperson = ? ORDER BY a.dtpublish";
		$nrTotPages = $this->_db->select($ftquery, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles */
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT a.* FROM personarticles ap, articles a ";
		$ftquery .= "WHERE a.idarticle = ap.idarticle AND ap.idperson = ?";
		$ftquery .= " ORDER BY a.dtpublish LIMIT ? OFFSET ?";

		$this->ftrows = $this->_db->select($ftquery, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getPersonArticles

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idarticle, fttitle1 FROM articles ORDER BY fttitle1";
			$ftrows	= $this->_db->select($ftquery);

			foreach($ftrows as $ftrow){
				$this->ftforeignkeys[$ftrow['idarticle']]	= $ftrow['fttitle1'];
			}
		}
		return $this->ftforeignkeys;
	}

}
?>