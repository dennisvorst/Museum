<?php
require_once "HtmlTable.php";
//require_once "MysqlDatabase.php";

class Games extends ListPage{

	var $nmtitle			= "Wedstrijden";
	var $nmtable 			= "games";
	var $nmsingle			= "game";
	protected $_searchFields 		= array();
	protected $_orderByFields 		= array("dtstart");

	/* for the tile list */
	var $nrcolumns = 1;

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

	function getMain($nmtab, $nrCurrentPage){
		/* create an index page for the competitions */

		/* create an index page for the articles */
		$this->getRecords("games", 0, 30);

		return $this->getPage("");
	}//getMain

	function getCompetitionGames($id){
		/* get the games that go with a competition */

		$sql = "SELECT g.*, ht.nmteam AS nmhome, at.nmteam AS nmaway ";
		$sql .= "FROM games g, participants ap, participants hp, teams at, teams ht ";
		$sql .= "WHERE ap.idparticipant = g.idaway ";
		$sql .= "AND hp.idparticipant = g.idhome ";
		$sql .= "AND ht.idteam = hp.idteam ";
		$sql .= "AND at.idteam = ap.idteam ";
		$sql .= "AND g.idcompetition = ? ";
		$sql .= "ORDER BY g.dtstart, g.tmstart ";

		$this->_rows = $this->_db->select($sql, "i", [$id]);

		return $this->getPage("");
	}

	function getPage($ftpagination){
        /* get the games */

		/* create a string with game information */
		if (count($this->_rows) == 0){
			return null;
		}

		/* init */
		$table = new HtmlTable();
		$table->addRow(new HtmlTableRow(["Date", "Time", "Home", "Away", "Score", "Innings"], [], "H"), "H");

		foreach ($this->_rows as $row){
			$game = new Game($this->_db, $this->_log);
			$game->setRecord($row);
			$game->processRecord();

			//$game->getStartDate(), $game->getStartTime(), $game->getHomeTeam(), $game->getAwayTeam(), $game->getHomeTeamRuns(), $game->getAwayTeamRuns(), $game->getNumberOfInnings()
			$cells[] = $game->getStartDate();
			$cells[] = $game->getStartTime();
			$cells[] = $game->getHomeTeam();
			$cells[] = $game->getAwayTeam();
			$cells[] = $game->getFinalScore();
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