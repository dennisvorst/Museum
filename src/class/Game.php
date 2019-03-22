<?php
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

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idgame'];
		$this->idcompetition	= $this->ftrecord['idcompetition'];
		$this->idhome			= $this->ftrecord['idhome'];
		$this->idaway			= $this->ftrecord['idaway'];
		$this->nrrunshome		= $this->ftrecord['nrrunshome'];
		$this->nrrunsaway		= $this->ftrecord['nrrunsaway'];
		$this->dtstart			= $this->ftrecord['dtstart'];
		$this->tmstart			= $this->ftrecord['tmstart'];
		$this->nrinnings		= $this->ftrecord['nrinnings'];
		/* not in table but value represtentaiton */
		$this->nmhome			= $this->ftrecord['nmhome'];
		$this->nmaway			= $this->ftrecord['nmaway'];

	}

	function createThumbnail(){
		/* create the thumbnail image */
        return $this->getNameWithUrl();
    }

	function getContent($nmCurrentTab, $nrCurrentPage){
//		print_r("getContent");
		/* get the article */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);
		$this->processRecord();

		return $html;
	}

	function getFullName(){
		return $this->idgame;
	}

	function getNameWithUrl(){
		return "<a href='" . $this->getUrl() . "' >". $this->getFullName() . "</a>";
	}

	function createHtmlTableRow(){
		/* create the tablerow */
		if (empty($this->id)){
			return null;
		}

		/* create the date */
		$dateObj	= new Date();


		$html	= "<tr>\n";
		$html	.= "<td><div align='right'>" . $dateObj->translateDate($this->dtstart, "D") ."</div></td>\n";

		$t = strtotime($this->tmstart);
		$html	.= "<td>" . date ( "H:i", $t ) ."</td>\n";

		$html	.= "<td><div align='center'>" . $this->nmhome ."</div></td>\n";
		$html	.= "<td><div align='center'>" . $this->nmaway ."</div></td>\n";
		$html	.= "<td><div align='right'>" . $this->nrrunshome . " - " . $this->nrrunsaway . "</div></td>\n";
		$html	.= "<td><div align='center'>" . $this->nrinnings ."</div></td>\n";

		$html	.= "</tr>\n";
        return $html;
    }
}
?>