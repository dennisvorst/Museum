<?php

class Participants extends ListPage{

	var $nmtitle			= "Deelnemers";
	var $nmtable 			= "participants";
	var $nmsingle			= "participant";
	var $searchFields 		= array("");
	var $orderByFields 		= array("nrgames", "nrwins", "nrdraws");

	/* for the tile list */
	var $nrcolumns = 1;

	var $participantsArray = array();

	var $ftfieldlist = array();

	function __construct() {
		parent::__construct();

		// create the fieldlist
		$this->ftfieldlist['nmteam'] = "Team";
		$this->ftfieldlist['nrgames'] = "G";
		$this->ftfieldlist['nrwins'] = "W";
		$this->ftfieldlist['nrlosses'] = "L";
		$this->ftfieldlist['nrdraws'] = "D";
		$this->ftfieldlist['nrrunsscored'] = "Runs voor";
		$this->ftfieldlist['nrrunsagainst'] = "Runs tegen";
	}

	function getMain($nmtab, $nrCurrentPage){
		/* create an index page for the competitions */

		/* create an index page for the articles */
		$this->getRecords("participants", 0, 30);

		return $this->getPage("");
	}//getMain

	function getCompetitionParticipants($id){
		/* get the participants that go with a competition */
		$ftquery = "SELECT p.idparticipant, t.nmteam, p.nrgames, p.nrwins, p.nrlosses, p.nrdraws, p.nrrunsscored, p.nrrunsagainst, p.ischampion ";
		$ftquery .= "FROM participants p, teams t ";
		$ftquery .= "WHERE t.idteam = p.idteam ";
		$ftquery .= "AND p.idcompetition = $id";

		$this->ftrows = $this->queryDB($ftquery);

		/* add additional stuff here */
		for($i = 0; $i < count($this->ftrows); $i++){
			$this->ftrows[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->ftrows[$i]['idparticipant'] . ">" . $this->ftrows[$i]['nmteam'] . "</a>\n";
			/* delete the idparticipant from the row. */
			unset($this->ftrows[$i]['idparticipant']);
			
			/* set the champion */
			//<i class="fa fa-trophy" aria-hidden="true"></i>
			if($this->ftrows[$i]['ischampion']){
				$this->ftrows[$i]['ischampion']	= "<i class='fa fa-trophy' aria-hidden='true' title='Kampioen'></i>";
			} else {
				$this->ftrows[$i]['ischampion']	= "";
			}

		}

		return $this->getPage("");
	}

	function getPage($ftpagination){
		/* create a string with photo information */

		if (count($this->ftrows) == 0){
			return null;
		}
		$table = new HtmlTable();

		$html = "<h2 class='art-postheader'>" . $this->nmtitle . "</h2>\n";
		$html	.= $table->createHtmlTable(array_values($this->ftfieldlist), $this->ftrows);

		return $html;
	}//getPage

	function getTable($fttiles, $nmclasstag = null){
		/* table headers */
		$html	= "<table>\n";
		$html	.= "  <tr>\n";
		$html	.= "    <th>Team</th>\n";
		$html	.= "    <th>G</th>\n";
		$html	.= "    <th>W</th>\n";
		$html	.= "    <th>L</th>\n";
		$html	.= "    <th>Runs voor</th>\n";
		$html	.= "    <th>Runs tegen</th>\n";
		$html	.= "  </tr>\n";

		for ($x=0; $x < count($fttiles); $x++){
			$html	.= $fttiles[$x] . "\n";
		}
		$html	.= "</table>\n";

		return $html;
	}
}
?>