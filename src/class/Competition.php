<?php
require_once "SingleItemPage.php";
require_once "Games.php";
require_once "Participants.php";
//require_once "MysqlDatabase.php";

class Competition extends SingleItemPage{
	protected $_nmtable	= "competitions";
	protected $_nmkey		= "idcompetition";

	var $nmcompetition;
	var $nmsub;
	var $nryear;
	var $cdsport;
	var $cdclass;
	var $cdgender;

	var $participantsObj;
	var $gamesObj;

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id				= $this->ftrecord['idcompetition'];

		$this->nmcompetition	= $this->ftrecord['nmcompetition'];
		$this->nmsub			= $this->ftrecord['nmsub'];
		$this->nryear			= $this->ftrecord['nryear'];
		$this->cdsport			= $this->ftrecord['cdsport'];
		$this->cdclass			= $this->ftrecord['cdclass'];
		$this->cdgender			= $this->ftrecord['cdgender'];
		$this->is_featured		= $this->ftrecord['is_featured'];
	}

	function createThumbnail(){
		/* create the thumbnail image */
        return $this->getNameWithUrl();
    }

	function getContent($nmCurrentTab, $nrCurrentPage) : string
	{
		/* get the article */
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{
			$this->processRecord();

			/* get the participants */
			$this->participantsObj = new Participants($this->_db, $this->_log);
			$participants = $this->participantsObj->getCompetitionParticipants($this->_id);

			/* get the games */
			$this->gamesObj = new Games($this->_db, $this->_log);
			$games = $this->gamesObj->getCompetitionGames($this->_id);

			/* show the information */
			$html = "<table>\n";
			$html .= "<tr>" . Social::addShareButtons($this->getUrl()) . "</tr>\n";
			$html .= "</table>\n";
			$html .= "<h1>$this->nmcompetition $this->nryear</h1>\n";

			$html .= $participants;

			$html .= $games;
		}
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