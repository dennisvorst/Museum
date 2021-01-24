<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Club.php";
require_once "MysqlDatabase.php";

class Clubs extends ListPage{
	var $nmtitle			= "Clubs";
	var $nmtable 			= "clubs";
	var $nmsingle			= "club";
	var $nmclass			= "Club";

	protected $_searchFields 		= array("nmfull", "nmclub", "ftlocation", "ftfield", "ftaddress");
	protected $_orderByFields 		= array("nmfull");
	var $nmAlphabetField	= "nmclub";

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);

		/* get a list of years */
		$this->alphabet	= $this->getAlphabet("clubs", "nmsearch");
//		$this->toolBar	= $this->createToolBar($this->alphabet, ListPage::$nmalphabet, "nmalphabet");
		$this->menuBar	= new MenuBar($this->_db);
	}


	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$ftquery = "SELECT idclub, nmclub ";
			$ftquery .= "FROM clubs ORDER BY nmclub";
			$ftrows	= $this->select($ftquery);

			foreach($ftrows as $ftrow){
				$ftvalrep = $ftrow['nmclub'];
				$this->ftforeignkeys[$ftrow['idclub']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}

}
?>