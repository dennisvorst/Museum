<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class ClubsModel implements iListModel
{

	protected $_collection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}


	/** get the articles of a specific year */
	function getFeatured() : array
	{
		$sql = "SELECT *
				FROM clubs
   				WHERE is_featured = 1
				ORDER BY nmclub";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}


	function getRecordsByYear(int $year) : array
	{
		throw new exception("Not required for clubs");
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		$letter .= "%";

		$sql = "SELECT *
		FROM clubs
		WHERE nmclub LIKE ?
		ORDER BY nmclub";

		$rows = $this->_db->select($sql, "s", [$letter]);
		return $this->_getCollection($rows);
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("To be implemented");
	}


	function getArticleRecords(int $id) : array
	{
		$sql = "SELECT c.*
		FROM clubs c, clubarticles ca
		WHERE c.idclub  = ca.idclub
		AND ca.idarticle = ?
		ORDER BY nmclub";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	function getClubRecords(int $id) : array
	{
		throw new exception("Not required for clubs");
	}


    function getPersonalRecords(int $id) : array
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
			$club = [];
			
			$club['id']		= $row['idclub'];
			$club['name']	= $row['nmclub'];

			$club['club'] = $club;

			$this->_collection[] = $club;
		}
		return $this->_collection;
	}
}
?>