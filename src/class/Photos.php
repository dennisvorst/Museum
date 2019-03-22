<?php
require_once "class/ListPage.php";
require_once "class/MenuBar.php";
require_once "class/Photo.php";

class Photos extends ListPage{
	var $debug 			= false;

	var $nmtitle		= "Foto's";
	var $nmtable 		= "photos";
	var $nmsingle		= "photo";
	var $nmclass		= "photo";

	var $searchFields	= array("ftdepicted", "ftdescription", "dtpublish", "nryear");
	var $orderByFields	= array("dtpublish");

	var $photoArray = array();

	/* for the tile list */
	var $nrcolumns = 4;


	/* constructor */
	function __construct(){
		parent::__construct();

		/* get a list of years */
		$this->years	= $this->getYears("photos");
		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar();
		}
	}

	function getClubPhotos($id, $nmCurrentTab, $nrCurrentPage){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		/* get the articles that go with a person */

		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM clubphotos cp, photos p WHERE p.idphoto = cp.idphoto AND cp.idclub = $id";
		$nrTotPages = $this->queryDB($ftquery);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the photos
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT p.* FROM clubphotos cp, photos p WHERE p.idphoto = cp.idphoto AND cp.idclub = $id LIMIT $this->nrRecordsOnPage OFFSET $nrOffSet";
		$this->ftrows = $this->queryDB($ftquery);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubPhotos

	function getPersonPhotos($id, $nmCurrentTab, $nrCurrentPage){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		/* get the articles that go with a person */

		/* get the total number of elements */
		$ftquery = "SELECT count(*) AS nrtotal FROM personphotos pp, photos p WHERE p.idphoto = pp.idphoto AND pp.idperson = $id";
		$nrTotPages = $this->queryDB($ftquery);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the photos
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$ftquery = "SELECT p.* FROM personphotos pp, photos p WHERE p.idphoto = pp.idphoto AND pp.idperson = $id LIMIT $this->nrRecordsOnPage OFFSET $nrOffSet";
		$this->ftrows = $this->queryDB($ftquery);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getPersonPhotos

	function getArticlePhotos($idarticle){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$query	= "SELECT * FROM photos p, articlephotos a WHERE a.idphoto = p.idphoto AND a.idarticle = $idarticle"	;
		$rows	= $this->queryDb($query);

		$x = 0;
		foreach ($rows as $row){
			$photo = new Photo();
			$photo->setRecord($row);
			$photo->processRecord();
			$photo->createMediumImage();

			$this->photoArray[$x] = $photo;
			$x++;
		}
	}//getArticlePhotos

	function getNumberPhotos(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* count the number of photos and return them */
		return count($this->photoArray);
	}//getNumberPhotos

	function getPhotos(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* return the photo object array */
		return $this->photoArray;
	}//getPhotos

	function getPhoto($x){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* return the photo object array */
		return $this->photoArray;
	}//getPhoto
}
?>