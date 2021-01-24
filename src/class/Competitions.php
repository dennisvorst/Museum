<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Competition.php";
require_once "MysqlDatabase.php";

class Competitions extends ListPage{

	var $nmtitle			= "Competities";
	var $nmtable 			= "competitions";
	var $nmsingle			= "competition";
	protected $_searchFields 		= array("nmcompetition");
	protected $_orderByFields 		= array("nryear", "nrorder", "cdsport", "cdclass", "cdgender", "nmcompetition");

	/* for the tile list */
	var $nrcolumns = 1;
//	var $nryear;

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);

		/* get a list of years */
		$this->years	= $this->getYears("competitions");
		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar($this->_db);
		}
	}

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idcompetition, nmcompetition, nmsub, nryear, IF(cdsport='HB', 'Honkbal', 'Softball') as cdsport ";
			$ftquery .= "FROM competitions ORDER BY nryear, nmcompetition, nmsub, cdsport";
			$ftrows	= $this->select($ftquery);

			foreach($ftrows as $ftrow){
				$ftvalrep = $ftrow['nryear'] . " " . $ftrow['nmcompetition'] . " " . trim($ftrow['nmsub'] . " " . $ftrow['cdsport']);
				$this->ftforeignkeys[$ftrow['idcompetition']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}

	function getPage($ftpagination){
		/* gather the data */
		$fttiles = array();
		$ftmensbaseball		= "";
		$ftwomensbaseball	= "";
		$ftmenssoftball		= "";
		$ftwomenssoftball	= "";

		$x = 0;
		foreach ($this->ftrows as $row){
			$object = new Competition();
			$object->setRecord($row);
			$object->processRecord();

			if ($object->getSport() == "HB"){
				if ($object->getGender() == "M"){
					if (empty($ftmensbaseball)){
						$ftmensbaseball = $object->createThumbnail();
					} else {
						$ftmensbaseball .= "</br>" . $object->createThumbnail();
					}
				} elseif ($object->getGender() == "F"){
					if (empty($ftwomensbaseball)){
						$ftwomensbaseball = $object->createThumbnail();
					} else {
						$ftwomensbaseball .= "</br>" . $object->createThumbnail();
					}
				}
			} elseif($object->getSport() == "SB") {
				if ($object->getGender() == "M"){
					if (empty($ftmenssoftball)){
						$ftmenssoftball = $object->createThumbnail();
					} else {
						$ftmenssoftball .= "</br>" . $object->createThumbnail();
					}
				} elseif ($object->getGender() == "F"){
					if (empty($ftwomenssoftball)){
						$ftwomenssoftball = $object->createThumbnail();
					} else {
						$ftwomenssoftball .= "</br>" . $object->createThumbnail();
					}
				}
			}
		}

		/* print the stuff */
		$html = "<h2 class='art-postheader'>" . $this->nmtitle . " " . $this->getYear() . "</h2>\n";
		if (count($this->ftrows) == 0){
			$html .= "<p>Geen resultaten gevonden voor " . strtolower($this->nmtitle) . ".</p>";
			return $html;
		}

		$html .= "<table id='competition'>";
		$ftheader	= "";
		$ftrows		= "";

		if (!empty($ftmensbaseball)){
			$ftheader	.= "<th>Honkbal Heren</th>";
			$ftrows		.= "<td>$ftmensbaseball</td>";
		}
		if (!empty($ftwomensbaseball)){
			$ftheader	.= "<th>Honkbal Dames</th>";
			$ftrows		.= "<td>$ftwomensbaseball</td>";
		}
		if (!empty($ftmenssoftball)){
			$ftheader	.= "<th>Softball Heren</th>";
			$ftrows		.= "<td>$ftmenssoftball</td>";
		}
		if (!empty($ftwomenssoftball)){
			$ftheader	.= "<th>Softball Dames</th>";
			$ftrows		.= "<td>$ftwomenssoftball</td>";
		}
		$html	.= "<tr>" . $ftheader . "</tr>";
		$html	.= "<tr>" . $ftrows . "</tr>";

		$html .= "</table>";

		return $html;
	}//getPage
}
?>