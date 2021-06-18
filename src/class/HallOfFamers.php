<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "Date.php";
require_once "ListPage.php";
require_once "Person.php";
require_once "Persons.php";
require_once "Photo.php";
//require_once "MysqlDatabase.php";

class HallOfFamers extends Persons{
	protected $_nmtitle	= "Eregalerij";
	protected $_nmtable 	= "persons";
	protected $_nmsingle	= "halloffamer";


	/* for the tile list */
	var $nrcolumns = 1;

	/* for pagination purposes we need this variable */
	static $nrcurrentarticlespage = 1;

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

	function getMain($nmtab, $nrCurrentPage) : string
	{
		/* get the info */
		$person_obj = new Person($this->_db, $this->_log);
		
		$sql		= "SELECT * 
					FROM persons 
					WHERE dthof IS NOT NULL
					ORDER BY nmlast";
		$rows	= $this->_db->select($sql);
		$persons = []; 
		foreach ($rows as $row){
			$row['name'] = $person_obj->getPersonName($row['nmfirst'], $row['nmsur'], $row['nmlast'], $row['hasdied']);
			$persons[] = $row;
		}

		/* create the html */
		$html = "<h2>" . $this->getTitle() . " </h2>\n";

		foreach ($persons as $person){
			$html	.= $this->createHtml($person);
		}
		
		return $html;
	}

	function createHtml($person) : string
	{
		$photo_obj	= new Photo($this->_db, $this->_log);
		$date_obj	= new Date();
		
		$src = $photo_obj->getPhotoName($person['idphotohof'], $photo_obj->getPhotoPath());
		$person['idphoto']	= "<img src='" . $src . "' >";
		$href = "index.php?option=person&id=" . $person['idperson'] . "'";

		$html = "<div class='card' style='width: 18rem;'>
		<img class='card-img-top' src='{$src}' alt='{$person['name']}'>
		<div class='card-body'>
		  <h5 class='card-title'><a href='{$href}'>{$person['name']}</a></h5>
		  <p class='card-text'>{$person['ftbiography']}</p>
		</div>
	  </div>"; 

		return $html;
	}
}
?>