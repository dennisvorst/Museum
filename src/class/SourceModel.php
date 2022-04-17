<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

require_once "PersonsModel.php";
require_once "ClubsModel.php";

class SourceModel implements iPageModel
{
	protected $_debug;

	protected $_db;
	protected $_log;
	protected $_id;


	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		/** init */
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM sources WHERE idsource = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];
			$this->_result['source']['id'] = $row['idsource'];
			$this->_result['source']['searchName'] = $row['nmsearch'];
			$this->_result['source']['sourceName'] = $row['nmsource'];
			$this->_result['source']['contactName'] = $row['nmcontact'];
			$this->_result['source']['address'] = $row['nmaddress'];
			$this->_result['source']['postalCode'] = $row['nmpostal'];
			$this->_result['source']['city'] = $row['nmcity'];
			$this->_result['source']['country'] = $row['cdcountry'];
			$this->_result['source']['phoneNumber'] = $row['ftphone'];
			$this->_result['source']['cellPhone'] = $row['ftcell'];
			$this->_result['source']['emailAddress'] = $row['ftemail'];
			$this->_result['source']['sourceUrl'] = $row['ftwebsite'];
	
		}
	}

	function getData() : array
	{
		return $this->_result;
	}
}
?>