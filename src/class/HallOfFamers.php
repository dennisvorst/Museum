<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Date.php";
require_once "ListPage.php";
require_once "Person.php";
require_once "Photo.php";
require_once "MysqlDatabase.php";

class HallOfFamers extends ListPage{
	var $nmtitle	= "Eregalerij";
	var $nmtable 	= "halloffamers";
	var $nmsingle	= "halloffamer";


	/* for the tile list */
	var $nrcolumns = 1;

	/* for pagination purposes we need this variable */
	static $nrcurrentarticlespage = 1;

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);
	}

	function getMain($nmtab, $nrCurrentPage){
		/* get the info */
		$person_obj = new Person();
		
		$sql		= "SELECT h.*, p.nmfirst, p.nmlast, p.nmsur, p.hasdied FROM persons p, halloffamers h WHERE h.idperson = p.idperson ORDER BY p.nmlast";
		$persons	= $this->select($sql);

		/* create the html */
		$html = "<h2 class='art-postheader'>" . $this->getTitle() . " </h2>\n";

		foreach ($persons as $person){
			$person['name'] = $person_obj->getPersonName($person['nmfirst'], $person['nmsur'], $person['nmlast'], $person['hasdied']);
			$html	.= "<h3 class='t'><a href='index.php?nmclass=person&id=" . $person['idperson'] . "'>" . $person['name']. "</a></h3>\n";
			
			
			$html	.= $this->createHtml($person);
		}
		
		return $html;
	}
	
	function getPersonHalloffamers($id){

		$sql	= "SELECT * FROM halloffamers WHERE idperson = ?";
		$person	= $this->select($sql, "i", [$id]);
		if (!empty($person[0])){
			return $this->createHtml($person[0]);
		} 
		return null;
	}
	
	function createHtml($person){		
		$photo_obj	= new Photo();
		$date_obj	= new Date();
		
		$person['idphoto']	= "<img src='" . $photo_obj->getPhotoName($person['idphoto'], $photo_obj->getPhotoPath()) . "' >";
		
		$html	= "<p>Gekozen in Hall of Fame op: " . $date_obj->translateDate($person['dthof'], "D") . "</p><br>\n";

		$html	.= "<div class='row'>\n";
		$html	.= "  <div class='col-xs-3'>\n";
		$html	.= $person['idphoto'];
		$html	.= "  </div>\n";
		$html	.= "  <div class='col-xs-9'>\n";
		$html	.= "<p>" . ($person['biography']) . "</p>\n";
		$html	.= "  </div>\n";
		$html	.= "</div>\n";
		$html	.= "<br>\n";
		
		return $html;
	}
}
?>