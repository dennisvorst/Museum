<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
//require_once "iListModel.php";

class HallOfFamersModel extends PersonsModel
{
	protected $_collection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}


	function getRecords() : array
	{
		$sql = "SELECT *
		FROM persons
		WHERE dthof IS NOT NULL
		ORDER BY dthof";

		$rows = $this->_db->select($sql);
		return $this->_getCollection($rows);
	}
}
?>