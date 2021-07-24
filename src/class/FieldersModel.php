<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class FieldersModel implements iListModel
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
		throw new exception("Not implemented");
	}
	

	function getRecordsByYear(int $year) : array
	{
		throw new exception("Not implemented");
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		throw new exception("Not implemented");
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("Not implemented");
	}


	function getArticleRecords(int $id) : array
	{
		throw new exception("Not implemented");
	}


	function getClubRecords(int $id) : array
	{
		throw new exception("Not implemented");
	}
	

	function getPhotoRecords(int $id) : array
	{
		throw new exception("Not implemented");
	}


	function getVideoRecords(int $id) : array
	{
		throw new exception("Not implemented");
	}
	

    function getPersonalRecords(int $id) : array
	{
		$sql = "SELECT * 
			FROM fielding
			WHERE idperson = ?";
		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_collection = [];

		foreach ($rows as $row)
		{
			$record = [];

			$record['fielding']['id'] = $row['idfielding'];
			$record['fielding']['idperson'] = $row['idperson'];
			$record['fielding']['idteam'] = $row['idteam'];

			$record['fielding']['year'] = $row['nryear'];
			$record['fielding']['caught'] = $row['nrc'];
			$record['fielding']['putOut'] = $row['nrpo'];
			$record['fielding']['attempts'] = $row['nra'];
			$record['fielding']['errors'] = $row['nre'];
			$record['fielding']['fieldingPercentage'] = $row['nrfldperc'];
			$record['fielding']['doublePlays'] = $row['nrdp'];
			$record['fielding']['stolenBaseAttempts'] = $row['nrsba'];
			$record['fielding']['caughtStealing'] = $row['nrcsb'];
			$record['fielding']['stolenBaseAttemptPercentage'] = $row['nrsbaperc'];
			$record['fielding']['passedBalls'] = $row['nrpb'];
			$record['fielding']['catcherInterference'] = $row['nrci'];
												
			$this->_collection[] = $record;
		}
		return $this->_collection;
	}
}
?>