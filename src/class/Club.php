<?php
require_once "SingleItemPage.php";
require_once "HtmlSelect.php";

class Club extends SingleItemPage{
	var $nmtable	= "clubs";
	var $nmkey		= "idclub";

	var $idclub;
	var $cdstatus;
	var $nmsearch;
	var $nmclub;
	var $nmfull;
	var $ftlocation;
	var $ftfield;
	var $ftaddress;
	var $ftpostalcode;
	var $nmcity;
	var $ftphone;

	var $nmprimarycolor;
	var $nmsecondarycolor;
	var $nmtertiarycolor;

	var $ftsubmenus = array("clubretired"=>"Retired Numbers", "teams"=>"Teams");

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idclub'];

		$this->cdstatus			= $this->ftrecord['cdstatus'];
		$this->nmsearch			= $this->ftrecord['nmsearch'];
		$this->nmclub			= $this->ftrecord['nmclub'];
		$this->nmfull			= $this->ftrecord['nmfull'];
		$this->ftlocation		= $this->ftrecord['ftlocation'];
		$this->ftfield			= $this->ftrecord['ftfield'];
		$this->ftaddress		= $this->ftrecord['ftaddress'];
		$this->ftpostalcode		= $this->ftrecord['ftpostalcode'];
		$this->nmcity			= $this->ftrecord['nmcity'];
		$this->ftphone			= $this->ftrecord['ftphone'];

		$this->nmprimarycolor	= $this->ftrecord['nmprimarycolor'];
		$this->nmsecondarycolor	= $this->ftrecord['nmsecondarycolor'];
		$this->nmtertiarycolor	= $this->ftrecord['nmtertiarycolor'];

		$this->is_featured			= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3){
		/* create the thumbnail image */
		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "  <div>\n";
		$html .= "    <a href='" . $this->getUrl() . "' >$this->nmfull</a>\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->ftlocation . "\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->ftfield . "\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";

		return $html;
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
		/**
		$nrCurrentPage = the current displayed tab page
		*/
		/*******************
		 gather the data
		 *******************/

		/* get the club */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		/*******************
		 create the content
		 *******************/
		$html = "<h1>" . $this->nmfull . "</h1>\n";

		/*******************
		 search and display the additional information
		 *******************/

		/* create the tabs */

		/* here is where i need to know to additional things.
		1. Which is the active tab?
		2. What is its current page number
		*/
		$list = array("articles", "videos", "photos", "persons", "teams");
//		$tabObj	= new Tab($this->id);
//		$html .= $tabObj->getTab("Club", $list, $nmCurrentTab, $nrCurrentPage);
		$html .= Tab::getTab("Club", $list, $nmCurrentTab, $nrCurrentPage, $this->id);

		return $html;
	}// getContent

	function getNameWithUrl(){
		return "<a href='". $this->getUrl() . "'>" . $this->nmfull . "</a>";
	}

	/* getters and setters */
//	function getClubName(){
//		/* deprecated */
//		return $this->nmclub;
//	}
	function getFullName(){
		return $this->nmclub;
	}
	function getLabels (){
		$ftlabels["idclub"]			= "";
		$ftlabels["cdstatus"]		= "Status";
		$ftlabels["nmsearch"]		= "Zoeknaam";
		$ftlabels["nmclub"]			= "Clubnaam";
		$ftlabels["nmfull"]			= "Volledige naam";
		$ftlabels["ftlocation"]		= "Locatie";
		$ftlabels["ftfield"]		= "Naam sportpark";
		$ftlabels["ftaddress"]		= "Adres";
		$ftlabels["ftpostalcode"]	= "Postcode";
		$ftlabels["nmcity"]			= "Plaats";
		$ftlabels["ftphone"]		= "Telefoon";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/

	/******************
	Lists
	*******************/
	function getClubs(){
		/* return a list of only the verified sources */
		$ftquery = "SELECT idclub, nmclub FROM clubs ORDER BY nmclub";
		$ftrows = $this->queryDb($ftquery);

		$ftvalues = array();
		foreach ($ftrows as $ftrow){
			$ftvalues[$ftrow['idclub']] = $ftrow['nmclub'];
		}
		return $ftvalues;
	}

	/******************
	Getters and setters
	*******************/
	function getPrimaryColor(){
		return $this->nmprimarycolor;
	}
	function getSecondaryColor(){
		return $this->nmsecondarycolor;
	}
	function getTertiaryColor(){
		return $this->nmtertiarycolor;
	}
}
?>