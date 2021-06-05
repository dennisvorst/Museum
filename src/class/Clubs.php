<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "Club.php";
//require_once "MysqlDatabase.php";

class Clubs extends ListPage{
	protected $_nmtitle			= "Clubs";
	protected $_nmtable 			= "clubs";
	protected $_nmsingle			= "club";
	protected $_nmclass			= "Club";

	protected $_searchFields 		= ["nmfull", "nmclub", "ftlocation", "ftfield", "ftaddress"];
	protected $_orderByFields 		= ["nmfull"];
	var $nmAlphabetField	= "nmclub";

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);

		/* get a list of years */
		$this->alphabet	= $this->getAlphabet("clubs", "nmsearch");
		$this->menuBar	= new MenuBar($this->_db);
	}


	function getForeignKeyValues(){
		if (empty($this->ftforeignkeys)){
			$sql = "SELECT idclub, nmclub ";
			$sql .= "FROM clubs ORDER BY nmclub";
			$rows	= $this->_db->select($sql);

			foreach($rows as $row){
				$ftvalrep = $row['nmclub'];
				$this->ftforeignkeys[$row['idclub']]	= $ftvalrep;
			}
		}
		return $this->ftforeignkeys;
	}
}
?>