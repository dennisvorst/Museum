<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "CheckBox.php";
require_once "SingleItemPage.php";
require_once "MysqlDatabase.php";
require_once "MysqlDatabase.php";

class Photo extends SingleItemPage{
	var $debug 			= false;

	var $nmtable		= "photos";
	var $nmkey			= "idphoto";
	var $photopath		= "./images/photos/";
	var $thumbnailpath	= "./images/thumbnails/";
	var $maxWidth 		= 600;
	var $maxHeight		= 600;
	var $maxThumbnailWidth	= 200;
	var $maxThumbnailHeight	= 200;

	var $persons		= array();
	var $clubs			= array();
	var $competitions	= array();
	var $articles		= array();

	var $idphoto;
	var $idsource;
	var $nmphotographer;
	var $nrorder;
	var $nryear;
	var $dtpublish;
	var $idoriginal;
	var $idmugshot;
	var $idaction;
	var $idteamphoto;
	var $ftdepicted;
	var $ftdescription;

	var $nrwidth;
	var $nrheight;
	var $nmfile;
	var $ftalignment = "";

	/* constructor */
	function __construct(MysqlDatabase $db){
		parent::__construct($db);
	}

	function processRecord(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->id				= $this->ftrecord['idphoto'];

		$this->idsource			= $this->ftrecord['idsource'];
		$this->nmphotographer	= $this->ftrecord['nmphotographer'];
		$this->nrorder			= $this->ftrecord['nrorder'];
		$this->nryear			= $this->ftrecord['nryear'];
		$this->dtpublish		= $this->ftrecord['dtpublish'];
		$this->idoriginal		= $this->ftrecord['idoriginal'];
		$this->idmugshot		= $this->ftrecord['idmugshot'];
		$this->idaction			= $this->ftrecord['idaction'];
		$this->idteamphoto		= $this->ftrecord['idteamphoto'];
		$this->ftdepicted		= $this->ftrecord['ftdepicted'];
		$this->ftdescription	= $this->ftrecord['ftdescription'];
		$this->is_featured			= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* create a thumbnail as part of a collection of records. */
		$image = $this->getThumbnail();

		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "<a href='" . $this->getUrl() . "'>$image</a>\n";
		$html .= "</div>\n";

		return $html;
	}//createThumbnail

	function getContent($nmCurrentTab, $nrCurrentPage){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the photo */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		/* create the photo */
		$photo = $this->createImage();

		/* get the source information */
		$sourceObj	= new Source();
		$sourceObj->setId($this->idsource);

//		$sourceLogo		= $sourceObj->getArticleLogo($this->id);

		$html = "<table>\n";
		$html .= "  <tr>" . Social::addShareButtons($this->getUrl()) . "</tr>\n";
		$html .= "  <tr>\n";
		$html .= "    <td>" . $photo . "</td>\n";
		$html .= "  </tr>\n";
		$html .= "</table>\n";

		return $html;
	}// getIndexPage

	function getMenu(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* needs to be overriden */
		$this->getPersons();
		$this->getClubs();
		$this->getArticles();

		$html = "";
		if (count($this->persons) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "  <div class='art-blockheader'>\n";
			$html .= "    <h3 class='t'>Personen</h3>\n";
			$html .= "  </div>\n";
			$html .= "  <div class='art-blockcontent'>\n";

			for ($x=0; $x<count($this->persons); $x++){
				$html .=  $this->persons[$x]->getNameWithUrl() . "</br>\n";
			}

			$html .= "  </div>\n";
			$html .= "</div>\n";

		} // endif (count($this->persons > 0)){

		if (count($this->clubs) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "  <div class='art-blockheader'>\n";
			$html .= "    <h3 class='t'>Clubs</h3>\n";
			$html .= "  </div>\n";
			$html .= "  <div class='art-blockcontent'>\n";

			for ($x=0; $x<count($this->clubs); $x++){
				$html .= $this->clubs[$x]->getNameWithUrl() . "</br>\n";;
			}

			$html .= "  </div>\n";
			$html .= "</div>\n";
		}

		if (count($this->competitions) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "  <div class='art-blockheader'>\n";
			$html .= "    <h3 class='t'>Competities</h3>\n";
			$html .= "  </div>\n";
			$html .= "  <div class='art-blockcontent'>\n";
			$html .= "  </div>\n";
			$html .= "</div>\n";
		}

		/* articles */
		if (count($this->articles) > 0){
			$html .= "<div class='art-block clearfix'>\n";
			$html .= "  <div class='art-blockheader'>\n";
			$html .= "    <h3 class='t'>Artikelen</h3>\n";
			$html .= "  </div>\n";
			$html .= "  <div class='art-blockcontent'>\n";

			for ($x=0; $x<count($this->articles); $x++){
				echo $this->articles[$x]->getNameWithUrl() . "</br>";
			}

			$html .= "  </div>\n";
			$html .= "</div>\n";
		}
	}//getMenu

	function getThumbnail(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* create the thumbnail image */
		if (empty($this->id)){
//			print_r("Photo::getThumbnail - Id is empty");
			return null;
		}

		// before we start get the image to six characters
        $image = $this->getPhotoName($this->id, $this->thumbnailpath);

        $image = "<img border='0' src='" . $image . "'>";
        return $image;
    }

    function getPhotoName($id, $path){
		/* if the ID is numeric edit it a little */
		/* if the file has the extension .jpg do not add another extension. */
		$image = $path . $id . ".jpg";

		/** check if the file exists **/
        if (!file_exists($image)) {
        	/** file doesnot exist so lets put a dummy in here **/
			$image = $path . "0.jpg";
		}

        return $image;
    }// getPhotoName


	function getPhotoProperties($nmfile){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
			print_r("nmfile " . $nmfile . "<br/>");
		}

		/*** input the file name. Output an array of vertical en horizontal widths ***/

		/* getimagesize is PHP specific function */
		$size = getimagesize($nmfile);

		$this->nrwidth  = $size[0];
		$this->nrheight = $size[1];
	}

	function createSmallImage(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->maxWidth		= 200;
		$this->maxHeight	= 200;

		return $this->createImage();
	}

	function createMediumImage(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->maxWidth		= 400;
		$this->maxHeight	= 400;

		return $this->createImage();
	}

	function createLargeImage(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->maxWidth		= 600;
		$this->maxHeight	= 600;

		return $this->createImage();
	}

	function createImage(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
			print_r("photopath " . $this->photopath . "<br/>");

		}

		/** create a photo in a suitable frame to go with the article **/
		if (empty($this->nmfile)){
			$this->nmfile = $this->getPhotoName($this->id, $this->photopath);
		}

		/** calculate the size **/
		$this->getPhotoProperties($this->nmfile);

		/** if both width and height of the image are smaller than the max than maintain the image dimensions **/
		$nrwidth	= $this->nrwidth;
		$nrheight	= $this->nrheight;
		if (($this->nrwidth > $this->maxWidth) or ($this->nrheight >  $this->maxHeight)){

			/** one of the dimensions is larger than the maximums **/
			if ($this->nrwidth > $this->nrheight){
				$nrheight  = round(($this->nrheight/$this->nrwidth) * $this->maxWidth);
				$nrwidth = $this->maxWidth;
			} else {
				$nrwidth = round(($this->nrwidth/$this->nrheight) * $this->maxHeight);
				$nrheight = $this->maxHeight;
			}
		}
		if ($this->debug){
			print_r("nmfile " . $this->nmfile . "<br/>");
			print_r("nrwidth " . $nrwidth . "<br/>");
			print_r("nrheight " . $nrheight . "<br/>");
		}

		/** create the URL and return it **/
		$sourceObj = new Source();
		$sourceObj->withId($this->idsource);

		$ftsourceUrl = $sourceObj->getSourceUrl();
		return $this->createUrl($nrwidth, $nrheight, $this->nmfile, $this->ftdescription, $ftsourceUrl, $this->ftalignment);
	}

	function createUrl($nrwidth, $nrheight, $nmimage, $ftsubscript, $ftsource, $ftalignment){

//        $html = "<div class='container photo photo-$ftalignment'>\n";
//		$html .= "<div class='image'><img src='" . $nmimage . "' width='" . $nrwidth . "' height='" . $nrheight . "'></div>\n";

        $html = "<div class='container photo photo-$ftalignment'>\n";
//		$html .= "<div class='image'><img src='" . $nmimage . "'></div>\n";
		$html .= "<div class='image'><img src='" . $nmimage . "' width='" . $nrwidth . "' height='" . $nrheight . "'></div>\n";
		$html .= "<div class='subscript'>" . $ftsubscript . " <b>(Foto: $ftsource)</b></div>\n";
		$html .= "</div>\n";

		return $html;
	}

	function setAlignment($x){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* set the alignment. Odds go on the left evens on the right */
		if ($x % 2 == 0) {
			$this->ftalignment = "left";
		} else {
			$this->ftalignment = "right";
		}
	}//setAlignment

	function setIdByArticle($idarticle){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* set the photo is based on the newspaper article id */
		$query	= "SELECT * FROM articlephotos WHERE idarticle = $idarticle limit 1";
		$rows	= $this->_db->select($query);
		if (!empty($rows)){
			$this->id = $rows[0]['idphoto'];
		}
	}
	function getMugshot($idperson){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the photos that where identified as mugshot for this individual. If no migshots were found return the default photo */
		/* set the default thumbnail */
        $thumbnail = "<img width='150' height='150' border='0' src='./images/unknown.png'/>\n";

		/* set the photo is based on the newspaper article id */
		$query	= "SELECT * FROM personphotos pp, photos p WHERE p.idphoto = pp.idphoto AND p.idmugshot = ? AND pp.idperson = ?";
		$rows	= $this->_db->select($query, "ii", [1, $idperson]);
		if (!empty($rows)){
			$nrrows = count($rows);
			$nrrow = rand(0, $nrrows -1);
			$this->id = $rows[$nrrow]['idphoto'];
			$thumbnail = $this->getThumbnail();
		}
		return $thumbnail;
	}

	function getPersons(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the persons that go with the article */
		$query	= "SELECT p.idperson FROM personphotos pp, persons p WHERE pp.idperson = p.idperson AND idphoto = ? ORDER BY p.nmlast"	;

		$rows	= $this->select($query, "i", [$this->id]);

		$x = 0;
		foreach ($rows as $row){
			$person = new Person();
			$person->withId($row['idperson']);
			$this->persons[$x]	= $person;
			$x++;
		}
	}

	function getClubs(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the clubs that go with the article */
		$query	= "SELECT c.idclub FROM clubs c, clubphotos cp WHERE c.idclub = cp.idclub AND idphoto = ? ORDER BY nmsearch";
		$rows	= $this->select($query, "i", [$this->id]);

		$x = 0;
		foreach ($rows as $row){
			$club = new Club();
			$club->withId($row['idclub']);
			$this->clubs[$x]	= $club;
			$x++;
		}
	}

	function getArticles(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the clubs that go with the article */
		$query	= "SELECT idarticle FROM articlephotos where idphoto = ?";

		$rows	= $this->select($query, "i", [$this->id]);

		$x = 0;
		foreach ($rows as $row){
			$article = new Article($this->_db);
			$article->withId($row['idarticle']);
			$this->articles[$x]	= $article;
			$x++;
		}
	}

	/***************************
	getters and setters
	****************************/
	function getThumbnailWidth(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->maxThumbnailWidth;
	}
	function getThumbnailHeight(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->maxThumbnailHeight;
	}

	/******************
	Labels
	*******************/
	function getLabels (){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$ftlabels["idphoto"]		= "";
		$ftlabels["idsource"]		= "Bron";
		$ftlabels["nmphotographer"]	= "Fotograaf";
		$ftlabels["nrorder"]		= "Bestel nummer";
		$ftlabels["nryear"]			= "Jaar";
		$ftlabels["dtpublish"]		= "Datum";
		$ftlabels["idoriginal"]		= "Origineel?";
		$ftlabels["idmugshot"]		= "Pasfoto?";
		$ftlabels["idaction"]		= "Actiefoto?";
		$ftlabels["idteamphoto"]	= "Teamfoto?";
		$ftlabels["ftdepicted"]		= "Afgebeeld";
		$ftlabels["ftdescription"]	= "Beschrijving";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	function setThumbnailpath($path){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		$this->thumbnailpath = $path;
	}

	function setPhotoPath($path){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		$this->photopath	= $path;
	}
	function getPhotoPath(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		return $this->photopath;
	}

	function setDebug($debug){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}
		$this->debug = $debug;
	}
	/******************
	Editable fields
	*******************/
}
?>