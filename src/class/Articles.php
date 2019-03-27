<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Article.php";
require_once "ListPage.php";
require_once "MenuBar.php";

class Articles extends ListPage{
	var $nmtitle		= "Artikelen";

	var $nmtable 		= "articles";
	var $nmsingle		= "article";
	var $nmclass 		= "Article";
	var $searchFields 	= array("fttitle1", "fttitle2", "fttitle3", "ftarticle", "nmauthor", "ftarticle");
	var $orderByFields 	= array("dtpublish");

	var $nrRecordsOnPage = 10;
	var $years;

	/* for the tile list */
	var $nrcolumns = 1;

	/* for pagination purposes we need this variable */
	static $nrcurrentarticlespage = 1;

	function __construct() {
		parent::__construct();

		/* get a list of years */
		$this->years	= $this->getYears("articles");

		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar();
		}
	}


	function getClubArticles($id, $nmCurrentTab, $nrCurrentPage){
		/* get the articles that go with a club
		These are always displayed in a tab page
		*/
		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = $id";
		$nrTotPages = $this->queryDB($ftquery);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT a.* FROM clubarticles ac, articles a WHERE a.idarticle = ac.idarticle AND ac.idclub = $id ORDER BY a.dtpublish LIMIT $this->nrRecordsOnPage OFFSET $nrOffSet";
		$this->ftrows = $this->queryDB($ftquery);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubArticles


	function getPersonArticles($id, $nmCurrentTab, $nrCurrentPage){
		/* get the articles that go with a person */

		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM personarticles ap, articles a WHERE a.idarticle = ap.idarticle AND ap.idperson = $id ORDER BY a.dtpublish";
		$nrTotPages = $this->queryDB($ftquery);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the articles */
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT a.* FROM personarticles ap, articles a ";
		$ftquery .= "WHERE a.idarticle = ap.idarticle AND ap.idperson = " . $id;
		$ftquery .= " ORDER BY a.dtpublish LIMIT $this->nrRecordsOnPage OFFSET " . $nrOffSet;

		$this->ftrows = $this->queryDB($ftquery);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getPersonArticles

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idarticle, fttitle1 FROM articles ORDER BY fttitle1";
			$ftrows	= $this->queryDb($ftquery);

			foreach($ftrows as $ftrow){
				$this->ftforeignkeys[$ftrow['idarticle']]	= $ftrow['fttitle1'];
			}
		}
		return $this->ftforeignkeys;
	}

}
?>