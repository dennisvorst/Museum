<?php
require_once "class/SingleItemPage.php";
require_once "class/Games.php";
require_once "class/Participants.php";

class Competition extends SingleItemPage{
	var $nmtable	= "competitions";
	var $nmkey		= "idcompetition";

	var $nmcompetition;
	var $nmsub;
	var $nryear;
	var $cdsport;
	var $cdclass;
	var $cdgender;

	var $participantsObj;
	var $gamesObj;

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idcompetition'];

		$this->nmcompetition	= $this->ftrecord['nmcompetition'];
		$this->nmsub			= $this->ftrecord['nmsub'];
		$this->nryear			= $this->ftrecord['nryear'];
		$this->cdsport			= $this->ftrecord['cdsport'];
		$this->cdclass			= $this->ftrecord['cdclass'];
		$this->cdgender			= $this->ftrecord['cdgender'];
		$this->is_featured			= $this->ftrecord['is_featured'];
	}

	function createThumbnail(){
		/* create the thumbnail image */
        return $this->getNameWithUrl();
    }

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the article */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		/* get the participants */
		$this->participantsObj = new Participants();
		$participants = $this->participantsObj->getCompetitionParticipants($this->id);

		/* get the games */
		$this->gamesObj = new Games();
		$games = $this->gamesObj->getCompetitionGames($this->id);

		/* show the information */
		$html = "<table>\n";
		$html .= "<tr>" . Social::addShareButtons($this->getUrl()) . "</tr>\n";
		$html .= "</table>\n";
		$html .= "<h1>$this->nmcompetition $this->nryear</h1>\n";

		$html .= $participants;

		$html .= $games;

		return $html;
	}

	function getFullName(){
		if (empty($this->nmsub)){
			return $this->nmcompetition . $this->nmsub;
		} else {
			return $this->nmcompetition . $this->nmsub;
		}
	}

	function getNameWithUrl(){
		return "<a href='" . $this->getUrl() . "' >". $this->getFullName() . "</a>";
	}

	function getClass(){
		return $this->cdclass;
	}

	function getGender(){
		return $this->cdgender;
	}

	function getSport(){
		return $this->cdsport;
	}

	/******************
	Labels
	*******************/
	function getLabels (){
		$ftlabels["idcompetition"]	= "";
		$ftlabels["idorganizer"]	= "Organisator";
		$ftlabels["nmcompetition"]	= "Naam";
		$ftlabels["nmsub"]			= "Subcategorie";
		$ftlabels["nryear"]			= "Jaar";
		$ftlabels["cdsport"]		= "Soort sport";
		$ftlabels["cdclass"]		= "Klasse";
		$ftlabels["cdgender"]		= "Geslacht";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
//	function getEditCdstatus($ftvalue = null){
//		return HtmlSelect::getStatus("cdstatus", $ftvalue);
//	}
}
?>