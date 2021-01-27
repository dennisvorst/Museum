<?php
require_once "ListPage.php";
require_once "MysqlDatabase.php";
require_once "Fielding.php";
require_once "Pitching.php";
require_once "Hitting.php";

class Stats extends ListPage{
	var $fthitting;
	var $ftpitching;
	var $ftfielding;

	var $tothitting;
	var $totpitching;
	var $totfielding;

	var $ftfieldlist 	= array();
	var $fthitlist		= array();
	var $ftpitchlist	= array();

	var $nmtitle		= "Statistieken";

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);
	}

	function processRecord(){
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
	}

	function getMain($nmtab, $nrCurrentPage){
		return "";
	}

	function getPersonStats($id)
	{
		/* get the stats of a person */

		/************************
		 * calculate Fielding
		 * nrfldperc = s calculated by the sum of putouts and assists divided by the number of total chances (putouts + assists + errors).
		 * nrsbaperc = SB% – Stolen base percentage: the percentage of bases stolen successfully. (SB) divided by (SBA)(stolen bases attempted).
		 ***********************/
		$fielding = new Fielding($this->_db);
		$fielding->getPersonStats($id);
		$this->ftfielding = $fielding->getRows();	
		$this->fttotfielding = $fielding->getTotals();
		$this->ftfieldlist = $fielding->getHeaders();

		if (!empty($this->fttotfielding))
		{
			$this->fttotfielding = $this->fttotfielding[0];
			/* add the total array to the beginning of the array */
			array_unshift($this->fttotfielding, "TOTAL", "");
		}

		/** Hitting */
		$hitting = new Hitting($this->_db);
		$hitting->getPersonStats($id);
		$this->fthitting = $hitting->getRows();	
		$this->fttothitting = $hitting->getTotals();
		$this->fthitlist = $hitting->getHeaders();

		if (!empty($this->fttothitting)) 
		{
			$this->fttothitting = $this->fttothitting[0];
			/* add the total array to the beginning of the array */
			array_unshift($this->fttothitting, "TOTAL", "");
		}
		
		/** Pitching */
		$pitching = new Pitching($this->_db);
		$pitching->getPersonStats($id);
		$this->ftpitching = $pitching->getRows();	
		$this->fttotpitching = $pitching->getTotals();
		$this->ftpitchlist = $pitching->getHeaders();

		if (!empty($this->fttotpitching)) 
		{
			$this->fttotpitching = $this->fttotpitching[0];
			/* add the total array to the beginning of the array */
			array_unshift($this->fttotpitching, "TOTAL", "");
		}

		return $this->getPage("");
	}


	function getPage($ftpagination) : string 
	{
		/* create the page content */
		/* gather the data */
		

		$html = "";
		/* process the stats */
		if (count($this->ftfielding) > 0){
			$table = new HtmlTable();
			$html	.= "<h2 class='art-postheader'>Fielding</h2>\n";
			$html	.= $table->createHtmlTable($this->ftfieldlist, $this->ftfielding, $this->fttotfielding);
		}
		if (count($this->fthitting) > 0) {
			$table = new HtmlTable();
			$html	.= "<h2 class='art-postheader'>Hitting</h2>\n";
			$html	.= $table->createHtmlTable($this->fthitlist, $this->fthitting, $this->fttothitting);
		}
		if (count($this->ftpitching) > 0){
			$table = new HtmlTable();
			$html	.= "<h2 class='art-postheader'>Pitching</h2>\n";
			$html	.= $table->createHtmlTable($this->ftpitchlist, $this->ftpitching, $this->fttotpitching);
		}

		return $html;
	}


}
?>