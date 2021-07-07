<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

class VideoModel implements iPageModel{

	protected $_id;
	protected $_url;
	protected $_name;

	protected $_result;

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM videos WHERE idvideo = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			$this->_result['id']	= $row['idvideo'];;
			$this->_result['name']	= $row['nmvideo'];
			$this->_result['url']	= $row['nmurl'];
		}
	}

	function getData() : array
	{
		return $this->_result;
	}
}
?>