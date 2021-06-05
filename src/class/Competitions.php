<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Competition.php";
//require_once "MysqlDatabase.php";

class Competitions extends ListPage{

	protected $_nmtitle			= "Competities";
	protected $_nmtable 			= "competitions";
	protected $_nmsingle			= "competition";
	protected $_searchFields 		= ["nmcompetition"];
	protected $_orderByFields 		= ["nryear", "nrorder", "cdsport", "cdclass", "cdgender", "nmcompetition"];

	/* for the tile list */
	var $nrcolumns = 1;
//	var $nryear;

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);

		/* get a list of years */
		$this->years	= $this->getYears("competitions");
		$this->menuBar = null;
		if (!empty($this->years)){
			$this->menuBar	= new MenuBar($this->_db);
		}
	}

	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$sql = "SELECT idcompetition, nmcompetition, nmsub, nryear, IF(cdsport='HB', 'Honkbal', 'Softball') as cdsport ";
			$sql .= "FROM competitions ORDER BY nryear, nmcompetition, nmsub, cdsport";
			$rows	= $this->_db->select($sql);

			foreach($rows as $row){
				$ftvalrep = $row['nryear'] . " " . $row['nmcompetition'] . " " . trim($row['nmsub'] . " " . $row['cdsport']);
				$this->ftforeignkeys[$row['idcompetition']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}

	function getPage($ftpagination){
		/* gather the data */
		$fttiles = [];
		$ftmensbaseball		= "";
		$ftwomensbaseball	= "";
		$ftmenssoftball		= "";
		$ftwomenssoftball	= "";

		$x = 0;
		foreach ($this->_rows as $row){
			$object = new Competition($this->_db, $this->_log); 
			$object->setRecord($row);
			$object->processRecord();

//			print_r($row);
//			print_r("<br><br>");

			if ($object->getSport() == "HB"){
//				print_r($row);

				if ($object->getGender() == "M"){
					if (empty($ftmensbaseball)){
						$ftmensbaseball = $object->createThumbnail();
					} else {
						$ftmensbaseball .= "<br>" . $object->createThumbnail();
					}
				} elseif ($object->getGender() == "F"){
					if (empty($ftwomensbaseball)){
						$ftwomensbaseball = $object->createThumbnail();
					} else {
						$ftwomensbaseball .= "<br>" . $object->createThumbnail();
					}
				}
			} elseif($object->getSport() == "SB") {
				if ($object->getGender() == "M"){
					if (empty($ftmenssoftball)){
						$ftmenssoftball = $object->createThumbnail();
					} else {
						$ftmenssoftball .= "<br>" . $object->createThumbnail();
					}
				} elseif ($object->getGender() == "F"){
					if (empty($ftwomenssoftball)){
						$ftwomenssoftball = $object->createThumbnail();
					} else {
						$ftwomenssoftball .= "<br>" . $object->createThumbnail();
					}
				}
			}
		}

		/* print the stuff */
		$html = "<h2>" . $this->_nmtitle . " " . $this->getYear() . "</h2>\n";
		if (count($this->_rows) == 0){
			$html .= "<p>Geen resultaten gevonden voor " . strtolower($this->_nmtitle) . ".</p>";
			return $html;
		}

		$html .= "<table id='competition'>";
		$ftheader	= "";
		$rows		= "";

		if (!empty($ftmensbaseball)){
			$ftheader	.= "<th>Honkbal Heren</th>";
			$rows		.= "<td>$ftmensbaseball</td>";
		}
		if (!empty($ftwomensbaseball)){
			$ftheader	.= "<th>Honkbal Dames</th>";
			$rows		.= "<td>$ftwomensbaseball</td>";
		}
		if (!empty($ftmenssoftball)){
			$ftheader	.= "<th>Softball Heren</th>";
			$rows		.= "<td>$ftmenssoftball</td>";
		}
		if (!empty($ftwomenssoftball)){
			$ftheader	.= "<th>Softball Dames</th>";
			$rows		.= "<td>$ftwomenssoftball</td>";
		}
		$html	.= "<tr>" . $ftheader . "</tr>";
		$html	.= "<tr>" . $rows . "</tr>";

		$html .= "</table>";

		return $html;
	}//getPage
}
?>