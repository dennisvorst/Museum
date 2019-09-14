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
		/* create a string with participant information */

		if (count($this->ftrows) == 0){
			return null;
		}

		/* gather the data */
		$table = new HtmlTable();
		$table->addRow(new HtmlTableRow(["Team", "G", "W", "L", "Runs voor", "Runs tegen", ""], "H"), "H");

		foreach ($this->ftrows as $row){
			$cells[] = $row['nmteam'];
			$cells[] = $row['nrgames'];
			$cells[] = $row['nrwins'];
			$cells[] = $row['nrlosses'];
			$cells[] = $row['nrdraws'];
			$cells[] = $row['nrrunsscored'];
			$cells[] = $row['nrrunsagainst'];
			$cells[] = $row['ischampion'];

			$table->addRow(new HtmlTableRow($cells));
			$cells  = null;
		}

		/* create the html */
		$html = "<h2 class='art-postheader'>" . $this->nmtitle . "</h2>\n";
		$html .= $table->getElement();
		return $html;

	}//getPage
}
?>