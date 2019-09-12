<?php
require_once "HtmlTable.php";

class Games extends ListPage{

	var $nmtitle			= "Wedstrijden";
	var $nmtable 			= "games";
	var $nmsingle			= "game";
	var $searchFields 		= array();
	var $orderByFields 		= array("dtstart");

	/* for the tile list */
	var $nrcolumns = 1;

	function __construct() {
		parent::__construct();
	}

	function getMain($nmtab, $nrCurrentPage){
		/* create an index page for the competitions */

		/* create an index page for the articles */
		$this->getRecords("games", 0, 30);

		return $this->getPage("");
	}//getMain

	function getCompetitionGames($id){
		/* get the games that go with a competition */

		$ftquery = "SELECT g.*, ht.nmteam AS nmhome, at.nmteam AS nmaway ";
		$ftquery .= "FROM games g, participants ap, participants hp, teams at, teams ht ";
		$ftquery .= "WHERE ap.idparticipant = g.idaway ";
		$ftquery .= "AND hp.idparticipant = g.idhome ";
		$ftquery .= "AND ht.idteam = hp.idteam ";
		$ftquery .= "AND at.idteam = ap.idteam ";
		$ftquery .= "AND g.idcompetition = $id ";
		$ftquery .= "ORDER BY g.dtstart, g.tmstart ";

		$this->ftrows = $this->queryDB($ftquery);

		return $this->getPage("");
	}

	function getPage($ftpagination){
        /* get the participants */

		/* create a string with game information */
		if (count($this->ftrows) == 0){
			return null;
		}

		/* init */
		$table = new HtmlTable();
		$table->addRow(new HtmlTableRow(["Date", "Time", "Home", "Away", "Score", "Innings"], "H"), "H");

		foreach ($this->ftrows as $row){
			$game = new Game();
			$game->setRecord($row);
			$game->processRecord();

			//$game->getStartDate(), $game->getStartTime(), $game->getHomeTeam(), $game->getAwayTeam(), $game->getHomeTeamRuns(), $game->getAwayTeamRuns(), $game->getNumberOfInnings()
			$cells[] = $game->getStartDate();
			$cells[] = $game->getStartTime();
			$cells[] = $game->getHomeTeam();
			$cells[] = $game->getAwayTeam();
			$cells[] = $game->getHomeTeamRuns() . " - " . $game->getAwayTeamRuns();
			$cells[] = $game->getNumberOfInnings();

			$table->addRow(new HtmlTableRow($cells));
			$cells = null;
		}

		/* create the html */
		$html = "<h2 class='art-postheader'>Wedstrijden</h2>\n";
		$html .= $table->getElement();
		return $html;
	}//getPage
}
?>