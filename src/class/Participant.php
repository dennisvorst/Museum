<?php
require_once "Date.php";
require_once "Games.php";
require_once "HtmlTable.php";
require_once "Persons.php";

class Participant extends SingleItemPage{
	protected $_nmtable	= "participants";
	protected $_nmkey		= "idparticipant";

	var $idcompetition;
	var $idteam;
	var $nrgames;
	var $nrwins;
	var $nrlosses;
	var $nrdraws;
	var $nrrunsscored;
	var $nrrunsagainst;

	var $nmparticipant;

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		$this->_id				= $this->ftrecord['idparticipant'];
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
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{

			/* init */
			$tableObj	= new HtmlTable(["class" =>"table table-striped"]);

			/* get the team name */
			$sql	= "SELECT * FROM teams WHERE idteam = ? ";
			$ftteam	= $this->_db->select($sql, "i", [$this->ftrecord['idteam']]);
			$nmteam	= $ftteam[0]['nmteam'];

			$sql		= "SELECT * FROM competitions WHERE idcompetition = ?";
			$ftteams	= $this->_db->select($sql, "i", [$this->ftrecord['idcompetition']]);

			/* get the coaches */
			$sql	= "SELECT * FROM rosters r, persons p WHERE r.idperson = p.idperson AND cdrole = ? AND idparticipant = ?";
			$sql	.= " ORDER BY nmlast, nmfirst, nmsur";
			$rows	= $this->_db->select($sql, "si", ['C', $this->ftrecord['idparticipant']]);

			$ftcoaches	= [];
			for ($i = 0; $i < count($rows);$i++){
				$nm	= $rows[$i]['nmlast'] . ", " . $rows[$i]['nmfirst'] . (empty($rows[$i]['nmsur']) ? "" : " " . $rows[$i]['nmsur'] . " " ) . ($rows[$i]["hasdied"]? " (&#8224;)" : "");
				$ftcoaches[$i]['nm']	= "<a href='index.php?option=person&id=" . $rows[$i]['idperson'] . "'>" . $nm . "</a>";
				if (isset($rows[$i]['cdcountry'])){
					$ftcoaches[$i]['cdcountry']	= "<img src='images/countries/" . $rows[$i]['cdcountry'] . ".png' > ";
				} else {
					$ftcoaches[$i]['cdcountry']	= "<img src='images/countries/__.png' > ";
				}
			}

			/* get the players */
			$sql	= "SELECT * FROM rosters r, persons p WHERE r.idperson = p.idperson AND cdrole = ? AND idparticipant = ?";
			$sql	.= " ORDER BY nmlast, nmfirst, nmsur";
			$rows	= $this->_db->select($sql, "si", ['P', $this->ftrecord['idparticipant']]);

			$ftplayers	= [];
			for ($i = 0; $i < count($rows);$i++){
				$nm	= $rows[$i]['nmlast'] . ", " . $rows[$i]['nmfirst'] . (empty($rows[$i]['nmsur']) ? "" : " " . $rows[$i]['nmsur'] . " " ) . ($rows[$i]["hasdied"]? " (&#8224;)" : "");
				$ftplayers[$i]['nm']	= "<a href='index.php?option=person&id=" . $rows[$i]['idperson'] . "'>" . $nm . "</a>";
				if (isset($rows[$i]['cdcountry'])){
					$ftplayers[$i]['cdcountry']	= "<img src='images/countries/" . $rows[$i]['cdcountry'] . ".png' width='50%'> ";
				} else {
					$ftplayers[$i]['cdcountry']	= "<img src='images/countries/__.png' > ";
				}
			}

			/* get the played games */
			$sql	= "SELECT dtstart, tmstart, idhome, idaway, nrrunshome, nrrunsaway, nrinnings ";
			$sql	.= "FROM games WHERE (idhome = ? OR idaway = ?) ";
			$sql	.= "AND idcompetition = " . $this->ftrecord['idcompetition'] . " ";
			$sql	.= "ORDER BY dtstart ASC, tmstart ASC";
			$ftgames	= $this->_db->select($sql, "ii", [$this->ftrecord['idparticipant'], $this->ftrecord['idparticipant']]);

			/* get the particpants */
			$sql	= "SELECT p.idparticipant, r.nmteam FROM participants p, teams r ";
			$sql	.= "WHERE r.idteam = p.idteam AND idcompetition = ?";
			$rows	= $this->_db->select($sql, "i", [$this->ftrecord['idcompetition']]);

			$ftparticipants	= [];
			foreach($rows as $row){
				$ftparticipants[$row['idparticipant']]	= $row['nmteam'];
			}

			$dateObj	= new Date();
			for ($i=0; $i<count($ftgames); $i++){
				$ftgames[$i]['dtstart']	= $dateObj->translateDate($ftgames[$i]['dtstart'], "D");

				$idhome	= $ftgames[$i]['idhome'];
				if ($idhome === $this->_id){
					$ftgames[$i]['idhome']	= "<b>" . $ftparticipants[$idhome] . "</b>";
				} else {
					$ftgames[$i]['idhome']	= $ftparticipants[$idhome];
				}

				$idaway	= $ftgames[$i]['idaway'];
				if ($idaway === $this->_id){
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
					$html .= $tableObj->createHtmlTable(["Naam"], $ftcoaches);
				}
				if (!empty($ftplayers)){
					$html .= "<h3>Spelers</h3>";
					$html .= $tableObj->createHtmlTable(["Naam"], $ftplayers);
				}
			}

			if (!empty($ftgames)){
				$html .= "<h2>Wedstrijden</h2>";
				$ftlabels = ["Datum", "Tijd", "Thuis", "Uit", "Voor", "Tegen", "Innings"];
				$html .= $tableObj->createHtmlTable($ftlabels, $ftgames);
			}

			if (!empty($this->ftrecord['fttext'])){
				$html .= "<br/><b>Notitie</b><br/>\n";
				$html .= $this->ftrecord['fttext'] . "\n";
			}
		}

		return $html;
	}

	/* getters and setters  */
	function getFullName(){
		return $this->nmparticipant;
	}

	function getNameWithUrl(){
		return "<a href='" . $this->getUrl() . "' >". $this->getFullName() . "</a>";
	}
	function getTotalGames()
	{
		return $this->nrgames; 
	}
	function getTotalWins()
	{
		return $this->nrwins; 
	}
	function getTotalLosses()
	{
		return $this->nrloss; 
	}
	function getTotalDraws()
	{
		return $this->nrdraws; 
	}
	function getTotalRunsScored()
	{
		return $this->nrrunsscored; 
	}
	function getTotalRunsAgainst()
	{
		return $this->nrrunsagainst; 
	}
}
?>