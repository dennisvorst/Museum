<?php
require_once "class/ListPage.php";
require_once "class/MenuBar.php";
require_once "class/Club.php";

class Clubs extends ListPage{
	var $nmtitle			= "Clubs";
	var $nmtable 			= "clubs";
	var $nmsingle			= "club";
	var $nmclass			= "Club";

	var $searchFields 		= array("nmfull", "nmclub", "ftlocation", "ftfield", "ftaddress");
	var $orderByFields 		= array("nmfull");
	var $nmAlphabetField	= "nmclub";

	function __construct() {
		parent::__construct();

		/* get a list of years */
		$this->alphabet	= $this->getAlphabet("clubs", "nmsearch");
//		$this->toolBar	= $this->createToolBar($this->alphabet, ListPage::$nmalphabet, "nmalphabet");
		$this->menuBar	= new MenuBar();
	}


	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idclub, nmclub ";
			$ftquery .= "FROM clubs ORDER BY nmclub";
			$ftrows	= $this->queryDb($ftquery);

			foreach($ftrows as $ftrow){
				$ftvalrep = $ftrow['nmclub'];
				$this->ftforeignkeys[$ftrow['idclub']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}

}
?>