<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Photo.php";
require_once "MysqlDatabase.php";

class Photos extends ListPage{
	var $nmtitle		= "Foto's";
	var $nmtable 		= "photos";
	var $nmsingle		= "photo";
	var $nmclass		= "photo";

	protected $_searchFields	= array("ftdepicted", "ftdescription", "dtpublish", "nryear");
	protected $_orderByFields	= array("dtpublish");

	var $photoArray = array();

	/* for the tile list */
	var $nrcolumns = 4;


	/* constructor */
	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);

		/* get a list of years */
		$this->years	= $this->getYears("photos");
		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar($this->_db);
		}
	}

	function getClubPhotos($id, $nmCurrentTab, $nrCurrentPage){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* get the articles that go with a person */

		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM clubphotos cp, photos p WHERE p.idphoto = cp.idphoto AND cp.idclub = ?";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the photos
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$sql = "SELECT p.* FROM clubphotos cp, photos p WHERE p.idphoto = cp.idphoto AND cp.idclub = ? LIMIT ? OFFSET ?";
		$this->ftrows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("club", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getClubPhotos

	function getPersonPhotos($id, $nmCurrentTab, $nrCurrentPage){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* get the articles that go with a person */

		/* get the total number of elements */
		$sql = "SELECT count(*) AS nrtotal FROM personphotos pp, photos p WHERE p.idphoto = pp.idphoto AND pp.idperson = ?";
		$nrTotPages = $this->_db->select($sql, "i", [$id]);
		$nrTotPages = round($nrTotPages[0]['nrtotal']/$this->nrRecordsOnPage, 0);

		/* get the photos
		The offset is the number of pages already displayed times the number of records on a single page
		*/
		$nrOffSet = 0;
		if ($nrCurrentPage > 1) {
			$nrOffSet = ($nrCurrentPage - 1) * $this->nrRecordsOnPage;
		}
		$sql = "SELECT p.* FROM personphotos pp, photos p WHERE p.idphoto = pp.idphoto AND pp.idperson = ? LIMIT ? OFFSET ?";
		$this->ftrows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);

		return $this->getTabPage("person", $id, $nmCurrentTab, $nrCurrentPage, $nrTotPages);
	}//getPersonPhotos

	function getArticlePhotos($idarticle){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$query	= "SELECT * FROM photos p, articlephotos a WHERE a.idphoto = p.idphoto AND a.idarticle = ?";
		$rows	= $this->_db->select($query, "i", [$idarticle]);

		$x = 0;
		foreach ($rows as $row){
			$photo = new Photo($this->_db);
			$photo->setRecord($row);
			$photo->processRecord();
			$photo->createMediumImage();

			$this->photoArray[$x] = $photo;
			$x++;
		}
	}//getArticlePhotos

	function getNumberPhotos(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* count the number of photos and return them */
		return count($this->photoArray);
	}//getNumberPhotos

	function getPhotos(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* return the photo object array */
		return $this->photoArray;
	}//getPhotos

	function getPhoto($x){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* return the photo object array */
		return $this->photoArray;
	}//getPhoto
}
?>