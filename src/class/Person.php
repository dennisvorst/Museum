<?php
require_once "SingleItemPage.php";
require_once "HtmlSelect.php";

class Person extends SingleItemPage{
	var $nmtitle	= "Personen";
	var $nmtable	= "persons";
	var $nmkey		= "idperson";

	var $nmfirst;
	var $nmfull;
	var $nmsur;
	var $nmlast;
	var $nmnick;
	var $cdgender;
	var $dtbirth;
	var $nmbirthplace;
	var $cdcountry;
	var $dtdeath;
	var $nmdeathplace;
	var $nmaddress;
	var $nmpostal;
	var $nmcity;
	var $ftphone;
	var $ftcell;
	var $ftemail;
	var $dthof;
	var $cdthrows;
	var $cdbats;
	var $cdsubscr;
	var $dtsend;
	var $nmclubstart;
	var $ftbiography;

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id			= $this->ftrecord['idperson'];

		$this->nmfirst 		= $this->ftrecord['nmfirst'];
		$this->nmfull 		= $this->ftrecord['nmfull'];
		$this->nmsur		= $this->ftrecord['nmsur'];
		$this->nmlast 		= $this->ftrecord['nmlast'];
		$this->nmnick 		= $this->ftrecord['nmnick'];
		$this->cdgender		= $this->ftrecord['cdgender'];
		$this->dtbirth 		= $this->ftrecord['dtbirth'];
		$this->nmbirthplace = $this->ftrecord['nmbirthplace'];
		$this->cdcountry 	= $this->ftrecord['cdcountry'];
		$this->dtdeath 		= $this->ftrecord['dtdeath'];
		$this->nmdeathplace = $this->ftrecord['nmdeathplace'];
		$this->nmaddress 	= $this->ftrecord['nmaddress'];
		$this->nmpostal 	= $this->ftrecord['nmpostal'];
		$this->nmcity 		= $this->ftrecord['nmcity'];
		$this->ftphone 		= $this->ftrecord['ftphone'];
		$this->ftcell 		= $this->ftrecord['ftcell'];
		$this->ftemail 		= $this->ftrecord['ftemail'];
		$this->dthof 		= $this->ftrecord['dthof'];
		$this->cdthrows 	= $this->ftrecord['cdthrows'];
		$this->cdbats 		= $this->ftrecord['cdbats'];
		$this->cdsubscr 	= $this->ftrecord['cdsubscr'];
		$this->dtsend 		= $this->ftrecord['dtsend'];
		$this->nmclubstart 	= $this->ftrecord['nmclubstart'];
		$this->ftbiography 	= $this->ftrecord['ftbiography'];
		$this->is_featured 	= $this->ftrecord['is_featured'];
	}

	var $_photoCollection;
	function getPhotoCollection(int $id) : array
	{

		return $this->_photoCollection;
	}


	function getContent($nmCurrentTab, $nrCurrentPage){
		/*******************
		 gather the data
		 *******************/
		/* get the person */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		/*******************
		 create the content
		 *******************/
		$html = "<table>\n";
		$html .= "<tr>" . Social::addShareButtons($this->getUrl()) . "</tr>\n";
		$html .= "</table>\n";
		$html .= "<h1>" . $this->getFullName() . "</h1>\n";

		/*******************
		 search and display the additional information
		 *******************/
		/* create the tabs */
		$list = array("articles", "photos", "videos", "stats", "teams", "halloffamers");
		$html .= Tab::getTab("Person", $list, $nmCurrentTab, $nrCurrentPage, $this->id);
		return $html;
	}// getContent

	function getMenu(){
		/* needs to be overriden */
		$html = "";
		return $html;

		$html .= "<div class='art-block clearfix'>\n";
		$html .= "<div class='art-blockheader'>\n";
		$html .= "<h3 class='t'>Personen</h3>\n";
		$html .= "</div>\n";
		$html .= "<div class='art-blockcontent'>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";
		$html .= "<div class='art-block clearfix'>\n";
		$html .= "<div class='art-blockheader'>\n";
		$html .= "<h3 class='t'>Clubs</h3>\n";
		$html .= "</div>\n";
		$html .= "<div class='art-blockcontent'>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";
		$html .= "<div class='art-block clearfix'>\n";
		$html .= "<div class='art-blockheader'>\n";
		$html .= "<h3 class='t'>Competities</h3>\n";
		$html .= "</div>\n";
		$html .= "<div class='art-blockcontent'>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";

		return $html;

	}//getMenu

//	function createThumbnail(){
//		/* get the thumbnail of the person */
//		$photoObj	= new Photo();
//		$mugshot	= $photoObj->getMugshot($this->id);
//		$width		= $photoObj->getThumbnailWidth();
//		$height		= $photoObj->getThumbnailHeight();

//		/* create the HTML */
//		$html = "<table width=\"100%\">\n";
//		$html .= "<tr>\n";
//		if (!empty($mugshot)){
//			$html .= "<td width='" . $width . "px' height='" . $width . "px'><a href='". $this->getUrl() . "'>" . $mugshot . "</a></td>\n";
//		}

//		$html .= "</tr>\n";
//		$html .= "<tr>\n";
//		$html .= "<td>". $this->getNameWithUrl() . "</td>\n";
//		$html .= "</tr>\n";
//		$html .= "</table>\n";
//		return $html;
//	}//createThumbnail


	function createThumbnail(){
		/* get the thumbnail of the person */
		$photoObj	= new Photo();
		$mugshot	= $photoObj->getMugshot($this->id);
		$width		= $photoObj->getThumbnailWidth();
		$height		= $photoObj->getThumbnailHeight();

		/* create the HTML */
		$html = "<div class='col-xs-3'>\n";
		$html .= "<div align='center'>\n";
		if (!empty($mugshot)){
			$html .= "<a href='". $this->getUrl() . "'>" . $mugshot . "</a>\n";
		}
//		$html .= "</div>\n";
//		$html .= "<div>\n";
		$html .= $this->getNameWithUrl() . "\n";
		$html .= "</div>\n";
		$html .= "</div>\n";
		return $html;
	}//createThumbnail

	function getFullName(){
		/* get the fullname of the player */
		return $this->nmfirst . " "	. $this->getLastName();
	}

	function getLastName(){
		if (empty($this->nmsur)){
			return $this->nmlast;
		} else {
			return $this->nmsur. " " . $this->nmlast;
		}
	}

	function getPersonName($nmfirst, $nmsur, $nmlast, $hasdied){
		/* get the fullname of the player */
		return $nmfirst . (empty($nmsur) ? " " : " " . $nmsur . " " ) . $nmlast . ($hasdied ? " (&#8224;)" : "");
	}

	function getNickName(){
		if (!empty($this->nmnick)){
			if (empty($this->nmsur)){
				return $this->nmnick . " "	. $this->nmlast;
			} else {
				return $this->nmnick . " "	. $this->nmsur. " " . $this->nmlast;
			}
		} else {
			return "";
		}
	}

	function getNameWithUrl(){
		return "<a href='". $this->getUrl() . "'>" . $this->getFullName() . "</a>";
	}

	function getLabels (){
		$ftlabels["idperson"]		= "";
		$ftlabels["nmfirst"]		= "Roepnaam";
		$ftlabels["nmfull"]			= "Volledige naam";
		$ftlabels["nmsur"]			= "Tussenvoegsel";
		$ftlabels["nmlast"]			= "Achternaam";
		$ftlabels["nmnick"]			= "Bijnaam";
		$ftlabels["cdgender"]		= "Geslacht";
		$ftlabels["dtbirth"]		= "Geboortedatum";
		$ftlabels["nmbirthplace"]	= "Geboorteplaats";
		$ftlabels["cdcountry"]		= "Land";
		$ftlabels["dtdeath"]		= "Datum overlijden";
		$ftlabels["nmdeathplace"]	= "Plaats van overlijden";
		$ftlabels["nmaddress"]		= "Adres";
		$ftlabels["nmpostal"]		= "Postcode";
		$ftlabels["nmcity"]			= "Plaats";
		$ftlabels["ftphone"]		= "Telefoon";
		$ftlabels["ftcell"]			= "Mobiel";
		$ftlabels["ftemail"]		= "Email";
		$ftlabels["dthof"]			= "In Hall of Fame sinds";
		$ftlabels["cdthrows"]		= "Gooit";
		$ftlabels["cdbats"]			= "Slaat";
		$ftlabels["cdsubscr"]		= "Geabboneerd";
		$ftlabels["dtsend"]			= "Datum verzonden";
		$ftlabels["nmclubstart"]	= "Eerste club";
		$ftlabels["ftbiography"]	= "Biografie";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
	function getEditCdbats($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getDexterity("cdbats", $ftvalue);
	}
	function getEditCdthrows($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getDexterity("cdthrows", $ftvalue);
	}
	function getEditIdsex($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getSex("cdgender", $ftvalue);
	}


}
?>