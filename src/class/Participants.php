<?php
require_once "MysqlDatabase.php";

class Participants extends ListPage{

	var $nmtitle			= "Deelnemers";
	var $nmtable 			= "participants";
	var $nmsingle			= "participant";
	protected $_searchFields 		= array("");
	protected $_orderByFields 		= array("nrgames", "nrwins", "nrdraws");

	/* for the tile list */
	var $nrcolumns = 1;

	var $participantsArray = array();

	var $ftfieldlist = array();

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);

		// create the fieldlist
		$this->ftfieldlist = ["nmteam" => "Team", "nrgames" => "G", "nrwins" => "W", "nrlosses" => "L", "nrdraws" => "D", "nrrunsscored" => "Runs voor", "nrrunsagainst" => "Runs tegen", "ischampion" => ""];
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
		$ftquery .= "AND p.idcompetition = ?";

		$this->ftrows = $this->select($ftquery, "i", [$id]);

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
		$keys = array_keys($this->ftfieldlist);
		$table = new HtmlTable();
		$table->addRow(new HtmlTableRow(array_values($this->ftfieldlist), "H"), "H");

		/* create the table rows */
		foreach ($this->ftrows as $row){
			foreach ($keys as $key)
			{
				$cells[] = $row[$key];
			}
			$table->addRow(new HtmlTableRow($cells));
			$cells  = null;
		}

		/* create the html */
		$html = "<h2 class='art-postheader'>" . $this->nmtitle . "</h2>\n";
		$html .= $table->getElement();
		return $html;

	}
}
?>