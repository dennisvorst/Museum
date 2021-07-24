<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

class PhotoModel implements iPageModel{

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM photos WHERE idphoto = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			$this->_result['photo']['id']		= $row['idphoto'];

			$this->_result['photo']['subscript'] = $row['ftdescription'];
			$this->_result['photo']['isMugshot'] = ($row['idmugshot'] == 1 ? "True" : "False");

			$this->_result['photo']['source']['id'] = $row['idsource'];
		}
	}


	function getData() : array
	{
		return $this->_result;
	}
}
?>