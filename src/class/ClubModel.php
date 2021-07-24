<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

class ClubModel implements iPageModel
{
	protected $_db;
	protected $_log;
	protected $_id;

	protected $_name;

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM clubs WHERE idclub = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			$this->_result['id'] = $row['idclub'];;
			$this->_result['name'] = $row['nmclub'];;

			$this->_result['club'] = $this->_result;
		}
	}

	function getData() : array
	{
		return $this->_result;
	}
}
?>