<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Date.php";
require_once "Photo.php";
require_once "Source.php";
require_once "CheckBox.php";
require_once "SingleItemPage.php";

require_once "ArticleView.php";
require_once "PhotoModel.php";
require_once "PersonModel.php";

class Article extends SingleItemPage{
	protected $_nmtitle	= "Artikelen";
	protected $_nmtable	= "articles";
	protected $_nmkey		= "idarticle";


	var $idsource;
	var $nryear;
	var $dtpublish;
	var $cdsport;

	protected $_authorName;
	protected $_mainTitle;
	protected $_subTitle;
	protected $_subSubTitle;
	protected $_articleText;

	var $nrparagraphs;
	var $nrMinParagraphLength = 100;

	/** collections */
	protected $_photoCollection		= [];
	protected $_personCollection	= [];
	protected $_clubCollection		= [];
	protected $_competitionCollection	= [];

	/* constructor */
	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}


	function processRecord(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id			= $this->ftrecord['idarticle'];

		$this->idsource		= $this->ftrecord['idsource'];
		$this->nryear		= $this->ftrecord['nryear'];
		$this->cdsport		= $this->ftrecord['cdsport'];

		$this->is_featured	= $this->ftrecord['is_featured'];

		$this->created_at	= $this->ftrecord['created_at'];
		$this->changed_at	= $this->ftrecord['updated_at'];
		$this->changed_by	= $this->ftrecord['updated_by'];

		$this->_authorName	= $this->ftrecord['nmauthor'];
		$this->_articleText = $this->ftrecord['ftarticle'];
		$this->_mainTitle 	= $this->ftrecord['fttitle1'];
		$this->_subTitle	= $this->ftrecord['fttitle2'];
		$this->_subSubTitle	= $this->ftrecord['fttitle3'];
		$this->_publishDate	= $this->ftrecord['dtpublish'];
	}


	function createThumbnail() : string
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* create a thumbnail as part of a collection of records. */


		/** MVC implementation */
		$json = $this->getDataArray();


		$json = json_encode($json);

		$view = new ArticleView($json);
		return $view->showThumbnail();
	}


	function getContent($nmCurrentTab, $nrCurrentPage){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the article */
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{
			$this->processRecord();

			/* get the source logo */
			$sourceObj	= new Source($this->_db, $this->_log);
			$sourceLogo	= $sourceObj->getArticleLogo($this->_id);
	

			/* create the article and add the photos */
			$media = Social::addShareButtons($this->getUrl());

			/** MVC implementation */
			$json = $this->getDataArray();

			$json['article']['source']['logo'] = $sourceLogo;

			$json = json_encode($json);
	
			$view = new ArticleView($json);
			$html = $view->show();
		}
		return $html;
	}// getIndexPage

	function getDataArray() : array
	{
		$json = [];

		$json['article']['id'] = $this->_id;
		$json['article']['mainTitle'] = $this->_mainTitle;
		$json['article']['publishDate'] = $this->_publishDate;
		$json['article']['authorName'] = $this->_authorName;
		$json['article']['text'] = $this->_articleText;

		/* look for a photo */
		$json['photos'] = $this->_getPhotoCollection($this->_id);

		/* look for persons */
		$json['persons'] = $this->_getPersonCollection($this->_id);

		return $json;
	}


	protected function _getPhotoCollection(int $id) : array
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* set the photo is based on the newspaper article id */
		if (empty($this->_photoCollection)) 
		{
			$this->_photoCollection = [];

			$sql	= "SELECT p.* FROM articlephotos ap, photos p WHERE ap.idarticle = ? AND ap.idphoto = p.idphoto";
			$rows	= $this->_db->select($sql, "i", [$id]);
			if (!empty($rows)){
				foreach($rows as $row)
				{
					$photo = new PhotoModel($row);
					$this->_photoCollection[] = $photo->getDataArray();
				}
			}
		}
		return $this->_photoCollection;
	}


	protected function _getPersonCollection() : array 
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		if (empty($this->_personCollection))
		{
			/* get the persons that go with the article */
			$query	= "SELECT p.* FROM personarticles a, persons p WHERE idarticle = ? AND a.idperson = p.idperson ORDER BY p.nmlast";

			$rows	= $this->_db->select($query, "i", [$this->_id]);
			foreach ($rows as $row){
				$person = new PersonModel($row);
				$this->_personCollection[]	= $person->getDataArray();
			}
		}
		return $this->_personCollection;
	}

	function getClubs(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the clubs that go with the article */
		$query	= "SELECT c.idclub FROM clubs c, clubarticles ac WHERE idarticle = ? AND c.idclub = ac.idclub ORDER BY nmsearch";

		$rows	= $this->_db->select($query, "i", [$this->_id]);

		$x = 0;
		foreach ($rows as $row){
			$club = new Club($this->_db, $this->_log);
			$club->withId($row['idclub']);
			$this->clubs[$x]	= $club;
			$x++;
		}
	}

	function getNameWithUrl(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		return "<a href='". $this->getUrl() . "'>" . $this->fttitle1 . "</a>";
	}
}
?>