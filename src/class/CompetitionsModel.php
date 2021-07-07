<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class CompetitionsModel implements iListModel
{
	protected $_collection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}

	function getFeatured() : array
	{
		$sql = "SELECT *
				FROM videos
   				WHERE is_featured = 1
				ORDER BY nmvideo";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}


	function getRecordsByYear(int $year) : array
	{
		$sql = "SELECT * 
				FROM competitions 
				WHERE nryear = ?";

		$rows = $this->_db->select($sql, "i", [$year]);
		return $this->_getCollection($rows);
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		throw new exception("Not required for videos");
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("To be implemented");
	}


	function getArticleRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


	function getClubRecords(int $id) : array
	{
		throw new exception("Not required for clubs");
	}


    function getPersonRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


    function getPhotoRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


    function getVideoRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_collection = [];
		foreach ($rows as $row)
		{
			$competition = [];
			
			$competition['id']		= $row['idcompetition'];
			$competition['name']	= $row['nmcompetition'];
			$competition['sub']		= $row['nmsub'];

			$competition['competition'] = $competition;

			$this->_collection[] = $competition;
		}
		return $this->_collection;
	}
}
?>