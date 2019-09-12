<?php
require_once "Date.php";
require_once "Games.php";
require_once "HtmlTable.php";
require_once "Persons.php";

class Participant extends SingleItemPage{
	var $nmtable	= "participants";
	var $nmkey		= "idparticipant";

	var $idcompetition;
	var $idteam;
	var $nrgames;
	var $nrwins;
	var $nrlosses;
	var $nrdraws;
	var $nrrunsscored;
	var $nrrunsagainst;

	var $nmparticipant;

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idparticipant'];
		$this->idcompetition	= $this->ftrecord['idcompetition'];
		$this->idteam			= $this->ftrecord['idteam'];

		$this->nrgames 			= $this->ftrecord['nrgames'];
		$this->nrwins 			= $this->ftrecord['nrwins'];
		$this->nrlosses 		= $this->ftrecord['nrlosses'];
		$this->nrdraws 			= $this->ftrecord['nrdraws'];
		$this->nrrunsscored 	= $this->ftrecord['nrrunsscored'];
		$this->nrrunsagainst 	= $this->ftrecord['nrrunsagainst'];
	}

	function createThumbnail(){
		/* create the thumbnail image */
        return $this->getNameWithUrl();
    }

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the participant info */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->id);

		/* init */
		$tableObj	= new HtmlTable();

		/* get the team name */
		$sql	= "SELECT * FROM teams WHERE idteam = " . $this->ftrecord['idteam'];
		$ftteam	= $this->queryDB($sql);
		$nmteam	= $ftteam[0]['nmteam'];

		$sql		= "SELECT * FROM competitions WHERE idcompetition = " . $this->ftrecord['idcompetition'];
		$ftteams	= $this->queryDB($sql);

		/* get the coaches */
		$sql	= "SELECT * FROM rosters r, persons p WHERE r.idperson = p.idperson AND cdrole = 'C' AND idparticipant = " . $this->ftrecord['idparticipant'];
		$sql	.= " ORDER BY nmlast, nmfirst, nmsur";
		$ftrows	= $this->queryDB($sql);

		$ftcoaches	= array();
		for ($i = 0; $i < count($ftrows);$i++){
			$nm	= $ftrows[$i]['nmlast'] . ", " . $ftrows[$i]['nmfirst'] . (empty($ftrows[$i]['nmsur']) ? "" : " " . $ftrows[$i]['nmsur'] . " " ) . ($ftrows[$i]["hasdied"]? " (&#8224;)" : "");
			$ftcoaches[$i]['nm']	= "<a href='index.php?nmclass=person&id=" . $ftrows[$i]['idperson'] . "'>" . $nm . "</a>";
			if (isset($ftrows[$i]['cdcountry'])){
				$ftcoaches[$i]['cdcountry']	= "<img src='images/countries/" . $ftrows[$i]['cdcountry'] . ".png' > ";
			} else {
				$ftcoaches[$i]['cdcountry']	= "<img src='images/countries/__.png' > ";
			}
		}

		/* get the players */
		$sql	= "SELECT * FROM rosters r, persons p WHERE r.idperson = p.idperson AND cdrole = 'P' AND idparticipant = " . $this->ftrecord['idparticipant'];
		$sql	.= " ORDER BY nmlast, nmfirst, nmsur";
		$ftrows	= $this->queryDB($sql);

		$ftplayers	= array();
		for ($i = 0; $i < count($ftrows);$i++){
			$nm	= $ftrows[$i]['nmlast'] . ", " . $ftrows[$i]['nmfirst'] . (empty($ftrows[$i]['nmsur']) ? "" : " " . $ftrows[$i]['nmsur'] . " " ) . ($ftrows[$i]["hasdied"]? " (&#8224;)" : "");
			$ftplayers[$i]['nm']	= "<a href='index.php?nmclass=person&id=" . $ftrows[$i]['idperson'] . "'>" . $nm . "</a>";
			if (isset($ftrows[$i]['cdcountry'])){
				$ftplayers[$i]['cdcountry']	= "<img src='images/countries/" . $ftrows[$i]['cdcountry'] . ".png' width='50%'> ";
			} else {
				$ftplayers[$i]['cdcountry']	= "<img src='images/countries/__.png' > ";
			}
		}

		/* get the played games */
		$sql	= "SELECT dtstart, tmstart, idhome, idaway, nrrunshome, nrrunsaway, nrinnings ";
		$sql	.= "FROM games WHERE (idhome = " . $this->ftrecord['idparticipant'] . " OR idaway = " . $this->ftrecord['idparticipant'] . ") ";
		$sql	.= "AND idcompetition = " . $this->ftrecord['idcompetition'] . " ";
		$sql	.= "ORDER BY dtstart ASC, tmstart ASC";
		$ftgames	= $this->queryDB($sql);

		/* get the particpants */
		$sql	= "SELECT p.idparticipant, r.nmteam FROM participants p, teams r ";
		$sql	.= "WHERE r.idteam = p.idteam AND idcompetition = " . $this->ftrecord['idcompetition'];
		$ftrows	= $this->queryDB($sql);

		$ftparticipants	= array();
		foreach($ftrows as $row){
			$ftparticipants[$row['idparticipant']]	= $row['nmteam'];
		}

		$dateObj	= new Date();
		for ($i=0; $i<count($ftgames); $i++){
			$ftgames[$i]['dtstart']	= $dateObj->translateDate($ftgames[$i]['dtstart'], "D");

			$idhome	= $ftgames[$i]['idhome'];
			if ($idhome === $this->id){
				$ftgames[$i]['idhome']	= "<b>" . $ftparticipants[$idhome] . "</b>";
			} else {
				$ftgames[$i]['idhome']	= $ftparticipants[$idhome];
			}

			$idaway	= $ftgames[$i]['idaway'];
			if ($idaway === $this->id){
				$ftgames[$i]['idaway']	= "<b>" . $ftparticipants[$idaway] . "</b";
			} else {
				$ftgames[$i]['idaway']	= $ftparticipants[$idaway];
			}
		}//endfor

		/* get the stats */
		$html = "<h1>" . $nmteam . "</h1>";;

		if (!empty($ftcoaches) or !empty($ftplayers)){
			$html .= "<h2>Roster</h2>";
			if (!empty($ftcoaches)){
				$html .= "<h3>Coaching</h3>";
				$html .= $tableObj->createHtmlTable(array("Naam"), $ftcoaches);
			}
			if (!empty($ftplayers)){
				$html .= "<h3>Spelers</h3>";
				$html .= $tableObj->createHtmlTable(array("Naam"), $ftplayers);
			}
		}

		if (!empty($ftgames)){
			$html .= "<h2>Wedstrijden</h2>";
			$ftlabels = array("Datum", "Tijd", "Thuis", "Uit", "Voor", "Tegen", "Innings");
			$html .= $tableObj->createHtmlTable($ftlabels, $ftgames);
		}

		if (!empty($this->ftrecord['fttext'])){
			$html .= "<br/><b>Notitie</b><br/>\n";
			$html .= $this->ftrecord['fttext'] . "\n";
		}



		return $html;
	}

	function getFullName(){
		return $this->nmparticipant;
	}

	function getNameWithUrl(){
		return "<a href='" . $this->getUrl() . "' >". $this->getFullName() . "</a>";
	}

	function createHtmlTableRow(){
		/* create the tablerow */
		if (empty($this->id)){
			return null;
		}
		$html	= "<tr>\n";
		$html	.= "  <td>" . $this->nmparticipant ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrgames ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrwins ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrloss ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrdraws ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrrunsscored ."</td>\n";
		$html	.= "  <td class='pull-right'>" . $this->nrrunsagainst ."</td>\n";
		$html	.= "</tr>\n";
        return $html;
    }
}
?>