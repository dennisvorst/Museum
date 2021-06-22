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


class Article extends SingleItemPage{
	protected $_nmtitle	= "Artikelen";
	protected $_nmtable	= "articles";
	protected $_nmkey		= "idarticle";

	var $persons	= [];
	var $clubs		= [];
	var $competitions	= [];

	var $idsource;
	var $nryear;
	var $dtpublish;
	var $nmauthor;
	var $fttitle1;
	var $fttitle2;
	var $fttitle3;
	var $cdsport;

	protected $_articleText;

	var $nrparagraphs;

	var $thumbTextLength = 380; //200;
	var $photosObj;

	var $nrMinParagraphLength = 100;

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
		$this->dtpublish	= $this->ftrecord['dtpublish'];
		$this->nmauthor		= $this->ftrecord['nmauthor'];

		$this->fttitle1		= $this->ftrecord['fttitle1'];
		$this->fttitle2		= $this->ftrecord['fttitle2'];
		$this->fttitle3		= $this->ftrecord['fttitle3'];
		$this->cdsport		= $this->ftrecord['cdsport'];

		$this->ftarticle	= $this->ftrecord['ftarticle'];
		$this->is_featured	= $this->ftrecord['is_featured'];

		$this->created_at	= $this->ftrecord['created_at'];
		$this->changed_at	= $this->ftrecord['updated_at'];
		$this->changed_by	= $this->ftrecord['updated_by'];
	}

	function createThumbnail() : string
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* create a thumbnail as part of a collection of records. */

		/* cut the article */
		if (empty($this->_articleText))
		{
			/** todo : find workable solution for empty body's of articles */
			//throw new exception("No article selected ({$this->_id}).");
		}

		/** gather the information */
		$authorName = $this->nmauthor;
		$articleText = $this->ftarticle;
		$mainTitle = $this->fttitle1;

		if (strlen($articleText) > $this->thumbTextLength){
			$articleText	= substr($articleText, 0, $this->thumbTextLength);
			$position		= strrpos($articleText, " ");
			$articleText	= substr($articleText, 0, $position + 1);
		}

		/* create the date */
		$dateObj	= new Date();
		$publishDate	= $dateObj->translateDate($this->dtpublish, "W");

		$colSize = (empty($photo) ? "col-lg-12" : "col-lg-9");

		$json['article']['id'] = $this->_id;
		$json['article']['mainTitle'] = $mainTitle;
		$json['article']['publishDate'] = $publishDate;
		$json['article']['authorName'] = $authorName;
		$json['article']['text'] = $articleText;

		/* look for a photo */
		$json['photos'] = $this->getPhotoCollection($this->_id);

		$json = json_encode($json);

		$view = new ArticleView($json);
		return $view->showThumbnail();
	}

	protected $_photoCollection;
	function getPhotoCollection(int $id) : array
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* set the photo is based on the newspaper article id */
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
		return $this->_photoCollection;
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
	
			/* translate the date */
			$dateObj		= new Date();
			$publishDate	= $dateObj->translateDate($this->dtpublish, "W");
	
			/* get the photos */
//			$this->photosObj = new Photos($this->_db, $this->_log);
//			$this->photosObj->getArticlePhotos($this->_id);
	
			/* create the article and add the photos */
			$media = Social::addShareButtons($this->getUrl());

			/** MVC implementation */
			$json['article']['id'] = $this->_id;
			$json['article']['mainTitle'] = $this->fttitle1;
			$json['article']['publishDate'] = $publishDate;
			$json['article']['authorName'] = $this->nmauthor;
			$json['article']['text'] = $this->ftarticle; // $this->getArticle();
			$json['article']['source']['logo'] = $sourceLogo;

			$json['photos'] = $this->getPhotoCollection($this->_id);

			$json = json_encode($json);
	
			$view = new ArticleView($json);
			$html = $view->show();
		}
		return $html;
	}// getIndexPage


	function getArticleTitle($fttitle, $ftheading){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* check if the string is filled if so return HTML else emptty string */
		if (empty($fttitle)){
			return "";
		} else {
			return "<div class='title'><" . $ftheading . ">" . $fttitle . "</" . $ftheading . "></div>\n";
		}
	}//getArticleTitle

	function getPersons(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the persons that go with the article */
		$query	= "SELECT p.idperson FROM personarticles a, persons p WHERE idarticle = ? AND a.idperson = p.idperson ORDER BY p.nmlast";

		$rows	= $this->_db->select($query, "i", [$this->_id]);
		$x = 0;
		foreach ($rows as $row){
			$person = new Person($this->_db, $this->_log);
			$person->withId($row['idperson']);
			$this->persons[$x]	= $person;
			$x++;
		}

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