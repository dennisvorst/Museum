<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Club.php";

class Teams extends ListPage{
	var $nmtitle			= "Teams";
	var $nmtable 			= "teams";
	var $nmsingle			= "team";
	var $nmclass			= "Team";

	var $searchFields 		= array("nmteam", "cdsport", "cdclass", "cdgender");
	var $orderByFields 		= array("nmteam", "cdsport", "cdclass", "cdgender");
	var $nmAlphabetField	= "nmteam";
	
	var $ftmensbaseball = [];
	var $ftmenssoftball = [];
	var $ftwomensbaseball = [];
	var $ftwomenssoftball = [];

	function __construct() {
		parent::__construct();

		/* get a list of years */
		$this->alphabet	= $this->getAlphabet("teams", "nmteam");
		$this->menuBar	= new MenuBar();
	}

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idteam, nmteam ";
			$ftquery .= "FROM teams ORDER BY nmteam";
			$ftrows	= $this->queryDb($ftquery);

			foreach($ftrows as $ftrow){
				$ftvalrep = $ftrow['nmteam'];
				$this->ftforeignkeys[$ftrow['idteam']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}

	function getPersonTeams($id, $nrCurrentPage){
		/* get the teams of a person */

		/* init */
		$nrTotPages = 1;
		
		return $this->getTabPage("person", $id, "Teams", $nrCurrentPage, $nrTotPages);
	}

	function getClubTeams($id, $nrCurrentPage){
		/* get the teams of a club */

		/* init */
		/* dvo: for now we just assume the number of pages is one. We need to still implement this.*/
		$nrTotPages = 1;


		$select = "SELECT * ";
		$select .= "FROM teams t, participants p, competitions c ";
		$select .= "WHERE t.idteam = p.idteam ";
		$select .= "AND c.idcompetition = p.idcompetition ";
		$select .= "AND t.idclub = $id ";

		$query 	= $select . "AND t.cdsport = 'HB' AND t.cdgender = 'M' ORDER BY c.nryear" ;
		$this->ftmensbaseball	= $this->queryDb($query);
		for($i = 0; $i < count($this->ftmensbaseball); $i++){
			$this->ftmensbaseball[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->ftmensbaseball[$i]['idparticipant'] . ">" . $this->ftmensbaseball[$i]['nmteam'] . "</a>\n";
		}

		$query 	= $select . "AND t.cdsport = 'HB' AND t.cdgender = 'F' ORDER BY c.nryear" ;
		$this->ftwomensbaseball	= $this->queryDb($query);
		for($i = 0; $i < count($this->ftwomensbaseball); $i++){
			$this->ftwomensbaseball[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->ftwomensbaseball[$i]['idparticipant'] . ">" . $this->ftwomensbaseball[$i]['nmteam'] . "</a>\n";
		}

		$query 	= $select . "AND t.cdsport = 'SB' AND t.cdgender = 'M' ORDER BY c.nryear" ;
		$this->ftmenssoftball	= $this->queryDb($query);
		for($i = 0; $i < count($this->ftmenssoftball); $i++){
			$this->ftmenssoftball[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->ftmenssoftball[$i]['idparticipant'] . ">" . $this->ftmenssoftball[$i]['nmteam'] . "</a>\n";
		}

		$query 	= $select . "AND t.cdsport = 'SB' AND t.cdgender = 'F' ORDER BY c.nryear" ;
		$this->ftwomenssoftball	= $this->queryDb($query);
		for($i = 0; $i < count($this->ftwomenssoftball); $i++){
			$this->ftwomenssoftball[$i]['nmteam']	= "<a href=index.php?nmclass=participant&id=" . $this->ftwomenssoftball[$i]['idparticipant'] . ">" . $this->ftwomenssoftball[$i]['nmteam'] . "</a>\n";
		}

		return $this->getTabPage("club", $id, "Teams", $nrCurrentPage, $nrTotPages);
	}

//	function getTabPage($nmparent, $idparent, $nrCurrentPage, $nrTotPages){
	function getTabPage($nmparent, $idparent, $nmtab, $nrCurrentPage, $nrTotPages){

		/* create the tab page content overriding the ListPage function */
		/* gather the data */

		/* if there are no teams at all */
		if ((count($this->ftmensbaseball) + count($this->ftwomensbaseball) + count($this->ftmenssoftball) + count($this->ftwomenssoftball)) == 0){
			return null;
		}
		$html	= "<h2 class='art-postheader'>Teams</h2>\n";

		$html .= "<table id='clubteams'>";

		$html .= $this->createHtmlTable("Honkbal Heren", $this->ftmensbaseball);
		$html .= $this->createHtmlTable("Honkbal Dames", $this->ftwomensbaseball);
		$html .= $this->createHtmlTable("Softball Heren", $this->ftmenssoftball);
		$html .= $this->createHtmlTable("Softball Dames", $this->ftwomenssoftball);

		$html .= "</table>";

		return $html;
	}//getTabPage


	function createHtmlTable($title, $rows){
		if (count($rows) == 0) {
			return "";
		}

		/* init */
		$nrgames		= 0;
		$nrwins			= 0;
		$nrlosses		= 0;
		$nrdraws		= 0;
		$nrrunsscored	= 0;
		$nrrunsagainst	= 0;

		/* create the HTML */
		$html = "<h2 class='art-postheader'>$title</h2>\n";
		$html .= "<table>\n";
		$html .= "<tr>\n";
		$html .= "<th>Jaar</th>\n";
		$html .= "<th>Team</th>";
		$html .= "<th>Competitie</th>";
		$html .= "<th>G</th>";
		$html .= "<th>W</th>";
		$html .= "<th>L</th>";
		$html .= "<th>D</th>";
		$html .= "<th colspan='3'>Runs</th>";

		$html .= "</tr>\n";

		foreach ($rows as $row){
			/* create the row */
			$html .= "<tr>\n";
			$html .= "<td>" . $row['nryear'] . "</td>\n";
			$html .= "<td>" . $row['nmteam'] . "</td>\n";
			$html .= "<td>" . trim($row['nmcompetition'] . " " . $row['nmsub']) .  "</td>\n";

			/* now only print when there are actual games played by the team */
			if ($row['nrgames'] > 0) {
				$html .= "<td><div class='pull-right'>" . $row['nrgames'] . "</div></td>\n";
				$html .= "<td><div class='pull-right'>" . $row['nrwins'] . "</div></td>\n";
				$html .= "<td><div class='pull-right'>" . $row['nrlosses'] . "</div></td>\n";
				$html .= "<td><div class='pull-right'>" . $row['nrdraws'] . "</div></td>\n";
//				$html .= "<td><div class='pull-right'>" . $row['nrrunsscored'] . " - " . $row['nrrunsagainst'] . "</div></td>\n";
				$html .= "<td><div class='pull-right'>" . $row['nrrunsscored'] . "</div></td>\n";
				$html .= "<td>-</td>\n";
				$html .= "<td><div class='pull-right'>" . $row['nrrunsagainst'] . "</div></td>\n";
				
			} else {
				/* else print no data */
				$html .= "<td colspan='6'>Geen gegevens.</td>\n";
			}

			$html .= "</tr>\n";

			/* add to the totals */
			$nrgames		+= $row['nrgames'];
			$nrwins			+= $row['nrwins'];
			$nrlosses		+= $row['nrlosses'];
			$nrdraws		+= $row['nrdraws'];
			$nrrunsscored	+= $row['nrrunsscored'];
			$nrrunsagainst	+= $row['nrrunsagainst'];

		}
		$html .= "<tr>\n";
		$html .= "  <td colspan='3'>Totaal</td>\n";
		$html .= "  <td><div class='pull-right'>" . $nrgames . "</div></td>\n";
		$html .= "  <td><div class='pull-right'>" . $nrwins . "</div></td>\n";
		$html .= "  <td><div class='pull-right'>" . $nrlosses . "</div></td>\n";
		$html .= "  <td><div class='pull-right'>" . $nrdraws . "</div></td>\n";
//		$html .= "  <td><div class='pull-right'>" . $nrrunsscored . " - " . $nrrunsagainst . "</div></td>\n";
		$html .= "<td><div class='pull-right'>" . $nrrunsscored . "</div></td>\n";
		$html .= "<td>-</td>\n";
		$html .= "<td><div class='pull-right'>" . $nrrunsagainst . "</div></td>\n";

		$html .= "</tr>\n";

		$html .= "</table>";

		return $html;
	}
}
?>