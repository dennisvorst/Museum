<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Date.php";
require_once "Photo.php";
require_once "Source.php";
require_once "CheckBox.php";
require_once "SingleItemPage.php";
require_once "MysqlDatabase.php";

class Article extends SingleItemPage{
	var $nmtitle	= "Artikelen";
	var $nmtable	= "articles";
	var $nmkey		= "idarticle";

	var $persons	= array();
	var $clubs		= array();
	var $competitions	= array();

	var $idsource;
	var $nryear;
	var $dtpublish;
	var $nmauthor;
	var $fttitle1;
	var $fttitle2;
	var $fttitle3;
	var $cdtype;
	var $ftarticle;
	var $nrparagraphs;

	var $thumbTextLength = 380; //200;
	var $photosObj;

	var $nrMinParagraphLength = 100;

	/* constructor */
	function __construct(MysqlDatabase $db){
		parent::__construct($db);
	}

	function processRecord(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$this->_id			= $this->ftrecord['idarticle'];

		$this->idsource		= $this->ftrecord['idsource'];
		$this->nryear		= $this->ftrecord['nryear'];
		$this->dtpublish	= $this->ftrecord['dtpublish'];
		$this->nmauthor		= $this->ftrecord['nmauthor'];

		$this->fttitle1		= $this->ftrecord['fttitle1'];
		$this->fttitle2		= $this->ftrecord['fttitle2'];
		$this->fttitle3		= $this->ftrecord['fttitle3'];
		$this->cdtype		= $this->ftrecord['cdtype'];

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
		if (empty($this->ftarticle)) 
		{
			throw new exception("No article selected.");
		}
				
		$ftarticle = $this->ftarticle;
		if (strlen($ftarticle) > $this->thumbTextLength){
			$ftarticle	= substr($ftarticle, 0, $this->thumbTextLength);
			$position	= strrpos($ftarticle, " ");
			$ftarticle	= substr($ftarticle, 0, $position + 1);
		}

		/* create the date */
		$dateObj	= new Date();
		$dtpublish	= $dateObj->translateDate($this->dtpublish, "W");

		/* look for a photo */
		$photoObj	= new Photo($this->_db);
		$photoObj->setIdByArticle($this->_id);

		$photo = array();
		if (!is_null($photoObj->getRecordId())) {
			$photo		= $photoObj->getThumbnail();
		}
		$colspan = 2;
		if (!empty($photo)){
			$colspan = 3;
		}

		/* create the return string */


		$data = "<table width=\"100%\">\n";
		$data .= "<tr>\n";

		$data .= "<td colspan='$colspan'><b>$this->fttitle1</b></td>\n";
		$data .= "</tr>\n";
		$data .= "<tr>\n";
		/*if there is a photo insert it*/
		if (!empty($photo)){
			$data .= "<td rowspan='3'>$photo</td>\n";
		}
		$data .= "<td width='50%'>$dtpublish</td>\n";
		$data .= "<td width='50%' align='right'>$this->nmauthor</td>\n";
		$data .= "</tr>\n";
		$data .= "<tr>\n";
		$data .= "<td colspan='2'>$ftarticle<a href='" . $this->getUrl() . "'>Lees meer</a></td>\n";
		$data .= "</tr>\n";
		$data .= "</table>\n";

		return $data;
	}

	var $_photoCollection;
	function getPhotoCollection(int $id) : array
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		return $this->_photoCollection;
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the article */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->_id);
		$this->processRecord();

		/* get the source logo */
		$sourceObj	= new Source($this->_db);
		$sourceLogo	= $sourceObj->getArticleLogo($this->_id);

		/* translate the date */
		$dateObj	= new Date();
    	$dtpublish	= $dateObj->translateDate($this->dtpublish, "W");

		/* get the photos */
		$this->photosObj = new Photos($this->_db);
		$this->photosObj->getArticlePhotos($this->_id);

		/* create the article and add the photos */
		$ftarticle	= $this->getArticle();

		$html = "<div class='article'>\n";
		$html .= "<div class='source'><img border='0' src='" . $sourceLogo . "'></div>\n";
		$html .= "<div class='container'>\n";
		$html .= "<div class='author'>" . $this->nmauthor . "</div>\n";
		$html .= "<div class='publishdate'>" . $dtpublish . "</p></div>\n";
		$html .= "</div>\n";

		$html .= $this->getArticleTitle($this->fttitle1, "h1");
		$html .= $this->getArticleTitle($this->fttitle2, "h2");
		$html .= $this->getArticleTitle($this->fttitle3, "h2");

		/* social media buttons */
		$html .= "<div class='container'>" . Social::addShareButtons($this->getUrl()) . "</div>";

		$html .= "<div class='articletext'>\n";
		$html .= $ftarticle;
		$html .= "</div>\n";
		$html .= "</div>\n";

		return $html;
	}// getIndexPage

	function getMenu(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* needs to be overriden */
		$html = "";

		$this->getPersons();
		$this->getClubs();


		if (count($this->persons) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "<div class='art-blockheader'>\n";
			$html .= "<h3 class='t'>Personen</h3>\n";
			$html .= "</div>\n";
			$html .= "<div class='art-blockcontent'>\n";

			for ($x=0; $x<count($this->persons); $x++){
				$html .= $this->persons[$x]->getNameWithUrl() . "</br>";
			}
			$html .= "</div>\n";
			$html .= "</div>\n";

		} // endif (count($this->persons > 0)){

		if (count($this->clubs) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "<div class='art-blockheader'>\n";
			$html .= "<h3 class='t'>Clubs</h3>\n";
			$html .= "</div>\n";
			$html .= "<div class='art-blockcontent'>\n";

			for ($x=0; $x<count($this->clubs); $x++){
				$html .= $this->clubs[$x]->getNameWithUrl() . "</br>";
			}
			$html .= "</div>\n";
			$html .= "</div>\n";
		}

		if (count($this->competitions) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "<div class='art-blockheader'>\n";
			$html .= "<h3 class='t'>Competities</h3>\n";
			$html .= "</div>\n";
			$html .= "<div class='art-blockcontent'>\n";
			$html .= "</div>\n";
			$html .= "</div>\n";
		}
		return $html;
	}//getMenu

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

	function getNumberParagraphs($ftarticle){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* calculate the number of large +300 characters paragraphs and the number of photos */
		/* turn it into an array */

		$nrparagraphs	= 0;
		$ftarticle		= $this->getArrayOfParagraphs($ftarticle);

		for ($x=0; $x<count($ftarticle); $x++){
			if (strlen($ftarticle[$x]) > $this->nrMinParagraphLength){
				$nrparagraphs++;
			}
		}// endfor
		return $nrparagraphs;
	}//getNumberParagraphs

	function getArticle(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* create the articles
		- no pictures - just return the article
		- 1 photo use it at the start of the
		- more than 1 photo distibute them evenly over the paragraphs
		- if there are more photos than paragraphs there is an issue

		*/
		/**************
		gather the data
		***************/
		$photos			= $this->photosObj->getPhotos();
		$nrphotos		= count($photos);
		$ftparagraphs 	= $this->getArrayOfParagraphs($this->ftarticle);
		$nrparagraphs	= count($ftparagraphs);
		/* if the array is not an arry. make it an array */
		if (!is_array($ftparagraphs)){
			$ftparagraphs = array($ftparagraphs);
		}

		$nrParagraphsInBetween = 0;
		if ($nrphotos > 0){
			$nrParagraphsInBetween = round($nrparagraphs/$nrphotos);
		}

		/***********************
		display the information
		************************/
		/* create the article */
		$ftarticle		= "";
		$nrcurrentphoto = 0;

		for ($x = 0; $x < count($ftparagraphs); $x++){
			/* process the photo stuff */

			/* if there are photos and we are not done processing */
			if ($nrphotos > 0 and ($x===0 or $nrcurrentphoto == ($x/$nrParagraphsInBetween))){
				/* add the photo to the article */
				/* but only if there are still photos */
				if ($nrcurrentphoto < count($photos)){
					$photos[$nrcurrentphoto]->setAlignment($nrcurrentphoto);
					$ftarticle .= $photos[$nrcurrentphoto]->createMediumImage();
					$nrcurrentphoto++;
				}
			}

			/* process the article stuff */
			if ($x === 0 or strlen($ftparagraphs[$x])<= 25){
				/* add the first picture and make the first paragraph bold */
				$ftarticle .= "<b>" . $ftparagraphs[$x] . "</b></br>";
			} else {
				$ftarticle .= $ftparagraphs[$x] . "</br>";
			}

		}//endfor
		return $ftarticle;


	}//getArticle

	function getArrayOfParagraphs($ftarticle){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* create an array of paragraphs from a string */
		/* first look for an eol character */
		if (strpos($ftarticle, chr(10)) > 0){
			/* turn it into an array */
			$ftarticle = explode(chr(10), $ftarticle);
		}
		return $ftarticle;
	}

	function getPersons(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the persons that go with the article */
		$query	= "SELECT p.idperson FROM personarticles a, persons p WHERE idarticle = ? AND a.idperson = p.idperson ORDER BY p.nmlast";
		
		$rows	= $this->_db->select($query, "i", [$this->_id]);
		$x = 0;
		foreach ($rows as $row){
			$person = new Person($this->_db);
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
			$club = new Club($this->_db);
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

	/******************
	Labels
	*******************/
	function getLabels (){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$ftlabels["idarticle"]	= "";
		$ftlabels["idsource"]	= "Bron";
		$ftlabels["nryear"]		= "Jaar";
		$ftlabels["dtpublish"]	= "Datum van publicatie";
		$ftlabels["nmauthor"]	= "Auteur";
		$ftlabels["fttitle1"]	= "Title";
		$ftlabels["fttitle2"]	= "Subtitle";
		$ftlabels["fttitle3"]	= "Bijschrift";
		$ftlabels["cdtype"]		= "Type";
		$ftlabels["ftarticle"]	= "Artikel";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
}
?>