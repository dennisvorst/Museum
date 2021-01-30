<?php
//require_once "MysqlDatabase.php";

class Game extends SingleItemPage{
	var $nmtable	= "game";
	var $nmkey		= "idgame";

	var $idcompetition;
	var $idgame;
	var $idhome;
	var $idaway;
	var $nrrunshome;
	var $nrrunsaway;
	var $dtstart;
	var $tmstart;
	var $nrinnings;

	var $nmhome;
	var $nmaway;

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		$this->_id				= $this->ftrecord['idgame'];
		$this->idcompetition	= $this->ftrecord['idcompetition'];
		$this->idhome			= $this->ftrecord['idhome'];
		$this->idaway			= $this->ftrecord['idaway'];
		$this->nrrunshome		= $this->ftrecord['nrrunshome'];
		$this->nrrunsaway		= $this->ftrecord['nrrunsaway'];
		$this->dtstart			= $this->ftrecord['dtstart'];
		$this->tmstart			= $this->ftrecord['tmstart'];
		$this->nrinnings		= $this->ftrecord['nrinnings'];
		/* not in table but value represtentation */
		$this->nmhome			= $this->ftrecord['nmhome'];
		$this->nmaway			= $this->ftrecord['nmaway'];

	}

	function createThumbnail(){
		/* create the thumbnail image */
        return $this->getNameWithUrl();
    }

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the article */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->_id);
		$this->processRecord();

		return $html;
	}

	/* getters and setters */
	function getFullName(){
		return $this->idgame;
	}

	function getNameWithUrl(){
		return "<a href='" . $this->getUrl() . "' >". $this->getFullName() . "</a>";
	}

	function getStartDate() : string
	{
		$dateObj	= new Date();
		return $dateObj->translateDate($this->dtstart, "D");
	}
	function getStartTime() : string
	{
		$t = strtotime($this->tmstart);
		return date ( "H:i", $t );
	}

	function getHomeTeam() : string 
	{
		return $this->nmhome;
	}
	function getAwayTeam() : string 
	{
		return $this->nmaway;
	}
	function getHomeTeamRuns() : string 
	{
		return  "" . $this->nrrunshome;
	}
	function getAwayTeamRuns() : string 
	{
		return  "" . $this->nrrunsaway;
	}
	function getNumberOfInnings() : string 
	{
		return  "" . $this->nrinnings;
	}
	function getFinalScore() : string 
	{
		$score = $this->getHomeTeamRuns() . " - " . $this->getAwayTeamRuns();
		if (trim($score) == "-")
		{
			$score = "";
		}
		return $score;
	}
}
?>