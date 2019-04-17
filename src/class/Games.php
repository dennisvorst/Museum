<?php
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
		$html = "<h2 class='art-postheader'>Wedstrijden</h2>\n";

		$fttiles = array();
		$x = 0;
		foreach ($this->ftrows as $row){
			$game = new Game();
			$game->setRecord($row);
			$game->processRecord();
			$fttiles[$x] = $game->createHtmlTableRow();
			$x++;
		}
		$html .= $this->getHtmlTable($fttiles);
		return $html;
	}//getPage


	function getHtmlTable($fttiles, $nmclasstag = null){
		/* table headers */
		$html	= "<table>\n";
		$html	.= "<tr>\n";
		$html	.= "<th>Date</th>\n";
		$html	.= "<th>Time</th>\n";
		$html	.= "<th>Home</th>\n";
		$html	.= "<th>Away</th>\n";
//		$html	.= "<th>Runs Home</th>\n";
//		$html	.= "<th>Runs Away</th>\n";
		$html	.= "<th>Score</th>\n";
		$html	.= "<th>Innings</th>\n";
		$html	.= "</tr>\n";

		for ($x=0; $x < count($fttiles); $x++){
			$html	.= $fttiles[$x] . "\n";
		}
		$html	.= "</table>\n";

		return $html;
	}
}
?>