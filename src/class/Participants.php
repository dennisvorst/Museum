<?php
//require_once "MysqlDatabase.php";

class Participants extends ListPage{

	protected $_nmtitle			= "Deelnemers";
	protected $_nmtable 			= "participants";
	protected $_nmsingle			= "participant";
	protected $_searchFields 		= array("");
	protected $_orderByFields 		= array("nrgames", "nrwins", "nrdraws");

	/* for the tile list */
	var $nrcolumns = 1;

	var $participantsArray = array();

	var $ftfieldlist = array();

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);

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
		$sql = "SELECT p.idparticipant, t.nmteam, p.nrgames, p.nrwins, p.nrlosses, p.nrdraws, p.nrrunsscored, p.nrrunsagainst, p.ischampion ";
		$sql .= "FROM participants p, teams t ";
		$sql .= "WHERE t.idteam = p.idteam ";
		$sql .= "AND p.idcompetition = ?";

		$this->_rows = $this->_db->select($sql, "i", [$id]);

		/* add additional stuff here */
		for($i = 0; $i < count($this->_rows); $i++){
			$this->_rows[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->_rows[$i]['idparticipant'] . ">" . $this->_rows[$i]['nmteam'] . "</a>\n";
			/* delete the idparticipant from the row. */
			unset($this->_rows[$i]['idparticipant']);

			/* set the champion */
			//<i class="fa fa-trophy" aria-hidden="true"></i>
			if($this->_rows[$i]['ischampion']){
				$this->_rows[$i]['ischampion']	= "<i class='fa fa-trophy' aria-hidden='true' title='Kampioen'></i>";
			} else {
				$this->_rows[$i]['ischampion']	= "";
			}

		}

		return $this->getPage("");
	}

	function getPage($ftpagination){
		/* create a string with participant information */

		if (count($this->_rows) == 0){
			return null;
		}

		/* gather the data */
		$keys = array_keys($this->ftfieldlist);
		$table = new HtmlTable();
		$table->addRow(new HtmlTableRow(array_values($this->ftfieldlist), [], "H"), "H");

		/* create the table rows */
		foreach ($this->_rows as $row){
			foreach ($keys as $key)
			{
				$cells[] = $row[$key];
			}
			$table->addRow(new HtmlTableRow($cells));
			$cells  = null;
		}

		/* create the html */
		$html = "<h2 class='art-postheader'>" . $this->_nmtitle . "</h2>\n";
		$html .= $table->getElement();
		return $html;

	}
}
?>