<?php
require_once "ListPage.php";
require_once "MysqlDatabase.php";

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

		// create the fieldlist
		$this->ftfieldlist	= ["Team", "Jaar", "C", "PO", "A", "E", "FLD%", "DP", "SBA", "CSB", "SBA%", "PB", "CI"];

		/* create the hitting list */
		$this->fthitlist	= ["Team", "Jaar", "AVG", "GP", "GS", "AB", "R", "H", "2B", "3B", "HR", "RBI", "TB", "SLG%", "BB", "HBP", "SO", "GDP", "OBP%", "SF", "SH", "SB", "ATT"];

		/* create the pitching list */
		$this->ftpitchlist	= ["Team", "Jaar", "W", "L", "App.", "GS", "CG", "SHO", "SV", "IP", "H", "R", "ER", "BB", "SO", "2B", "3B", "HR", "AB", "Opp. Avg.", "WP", "HBP", "BK", "ERA"];
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
		/* get the teams of a person */
		/* where clause */
		$ftwhere = "WHERE t.idteam = s.idteam AND idperson = ?";
		$types = "i";
		$values = [$id];

		/************************
		 * calculate Fielding
		 * nrfldperc = s calculated by the sum of putouts and assists divided by the number of total chances (putouts + assists + errors).
		 * nrsbaperc = SB% – Stolen base percentage: the percentage of bases stolen successfully. (SB) divided by (SBA)(stolen bases attempted).
		 ***********************/
		/** table rows */
		$ftquery = "SELECT t.nmteam, s.nryear, s.nrc, s.nrpo, s.nra, s.nre, ";
		$ftquery .= "ROUND((s.nrpo+s.nra)/(s.nrpo+s.nra+s.nre), 3) AS nrfldperc, "; /* nrfldperc */
		$ftquery .= "s.nrdp, s.nrsba, s.nrcsb, ";
		$ftquery .= "ROUND(s.nrsbaperc, 3) AS nrsbaperc, "; /* nrsbaperc */
		$ftquery .= "s.nrpb, s.nrci FROM fielding s, teams t " . $ftwhere;
		$this->ftfielding = $this->_db->select($ftquery, $types, $values);

		/** footer rows */
		$ftquery = "SELECT SUM(s.nrc) AS nrc, SUM(s.nrpo) AS nrpo, SUM(s.nra) AS nra, SUM(s.nre) AS nre, ";
		$ftquery .= "ROUND((SUM(s.nrpo)+SUM(s.nra))/(SUM(s.nrpo)+SUM(s.nra)+SUM(s.nre)), 3) AS nrfldperc, "; /* nrfldperc */
		$ftquery .= "SUM(s.nrdp) AS nrdp, SUM(s.nrsba) AS nrsba, SUM(s.nrcsb) AS nrcsb, ";
		$ftquery .= "ROUND(SUM(s.nrcsb)/SUM(s.nrsba), 3) AS nrsbaperc, "; /* nrsbaperc */
		$ftquery .= "SUM(s.nrpb) AS nrbp, SUM(s.nrci) AS nrci FROM fielding s, teams t " . $ftwhere;

		$this->fttotfielding = $this->_db->select($ftquery, $types, $values);
		if (!empty($this->fttotfielding))
		{
			$this->fttotfielding = $this->fttotfielding[0];
			/* add the total array to the beginning of the array */
			array_unshift($this->fttotfielding, "TOTAL", "");
		}

		/* add the total array to the beginning of the array */

		/************************
		 * calculate Hitting
		 ***********************/
		$ftquery = "SELECT t.nmteam, s.nryear, ";
		$ftquery .= "ROUND(s.nrh/s.nrab, 3), ";
		$ftquery .= "s.nrgp, s.nrgs, s.nrab, s.nrr, s.nrh, s.nr2b, s.nr3b, s.nrhr, s.nrrbi, s.nrtb, ";
		/* s.nrh contains the total of hits. So doubles and triples are counted in there. That is why we multiply doubles by 2-1, triples by 3-1 etc. */
		$ftquery .= "ROUND((s.nrh + s.nr2b + (s.nr3b*2) + (s.nrhr*3)) / s.nrab,3), ";
		$ftquery .= "s.nrbb, s.nrhbp, s.nrso, s.nrgdp, ";
		$ftquery .= "s.nrobperc, ";
		$ftquery .= "s.nrsf, s.nrsh, s.nrsb, s.nratt FROM hitting s, teams t " . $ftwhere;
		$this->fthitting = $this->_db->select($ftquery, $types, $values);

		/************************
		 * calculate Hitting totals
		 ***********************/
		$ftquery = "SELECT ";
		$ftquery .= "ROUND(SUM(s.nrh)/SUM(s.nrab), 3), ";
		$ftquery .= "SUM(s.nrgp), SUM(s.nrgs), SUM(s.nrab), SUM(s.nrr), SUM(s.nrh), SUM(s.nr2b), SUM(s.nr3b), SUM(s.nrhr), SUM(s.nrrbi), SUM(s.nrtb), ";
		$ftquery .= "ROUND((SUM(s.nrh) + SUM(s.nr2b) + (SUM(s.nr3b)*2) + (SUM(s.nrhr)*3)) / SUM(s.nrab),3), "; /* slgperc*/
		$ftquery .= "SUM(s.nrbb), SUM(s.nrhbp), SUM(s.nrso), SUM(s.nrgdp), ";
		$ftquery .= "0, "; /* nrobpperc */
		$ftquery .= "SUM(s.nrsf), SUM(s.nrsh), SUM(s.nrsb), SUM(s.nratt) FROM hitting s, teams t " . $ftwhere;

		$this->fttothitting = $this->_db->select($ftquery, $types, $values);
		if (!empty($this->fttothitting)) 
		{
			$this->fttothitting = $this->fttothitting[0];
			/* add the total array to the beginning of the array */
			array_unshift($this->fttothitting, "TOTAL", "");
		}
		

		/************************
		 * calculate Pitching
		 ***********************/
		$ftquery = "SELECT t.nmteam, s.nryear, s.nrw, s.nrl, s.nrapp, s.nrgs, s.nrcg, s.nrsho, s.nrsv, s.nrip, s.nrh, s.nrr, s.nrer, s.nrbb, s.nrso, s.nr2b, s.nr3b, s.nrhr, s.nrab, ";
		$ftquery .= "ROUND((s.nrh/s.nrab), 3), "; /* opp avg */
		$ftquery .= "s.nrwp, s.nrhbp, s.nrbk, ";
		$ftquery .= "ROUND((s.nrer)/(FLOOR(s.nrip) + ROUND(MOD(s.nrip, FLOOR(s.nrip)),1)*(1/3)*10)*9, 2) "; /* era */
		$ftquery .= "FROM pitching s, teams t " . $ftwhere;
		$this->ftpitching = $this->_db->select($ftquery, $types, $values);

		/************************
		 * calculate Pitching totals
		 ***********************/
		/* determine the number of innings pitched */
		$ftquery = "SELECT SUM(FLOOR(s.nrip)) + SUM(ROUND(MOD(s.nrip, FLOOR(s.nrip)),1))*(20/3) as nrtotinnings ";
		$ftquery .= "FROM pitching s, teams t " . $ftwhere;
		$nrtotinnings = $this->_db->select($ftquery, $types, $values);
		$nrtotinnings = $nrtotinnings[0]['nrtotinnings'];
		if (empty($nrtotinnings)){
			$nrtotinnings = 0;
		}

		$ftquery = "SELECT SUM(s.nrw), SUM(s.nrl), SUM(s.nrapp), SUM(s.nrgs), SUM(s.nrcg), SUM(s.nrsho), SUM(s.nrsv), SUM(s.nrip), SUM(s.nrh), SUM(s.nrr), SUM(s.nrer), SUM(s.nrbb), SUM(s.nrso), SUM(s.nr2b), SUM(s.nr3b), SUM(s.nrhr), SUM(s.nrab), ";
		$ftquery .= "ROUND((SUM(s.nrh)/SUM(s.nrab)), 3), "; /* opp avg */
		$ftquery .= "SUM(s.nrwp), SUM(s.nrhbp), SUM(s.nrbk), ";
		$ftquery .= "ROUND((SUM(s.nrer)/$nrtotinnings)*9, 2) "; /* era */
		$ftquery .= "FROM pitching s, teams t " . $ftwhere;
		$this->fttotpitching = $this->_db->select($ftquery, $types, $values);
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