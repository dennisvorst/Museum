<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class PitchersModel implements iListModel
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
			FROM pitching
			WHERE idperson = ?";
		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		/** todo add team information  */
		/** todo add person information  */
		$this->_collection = [];
		foreach ($rows as $row)
		{
			$record = [];

			$record['pitching']['id'] = $row['idpitching'];
			$record['pitching']['idperson'] = $row['idperson'];
			$record['pitching']['idteam'] = $row['idteam'];
			$record['pitching']['year'] = $row['nryear'];
			$record['pitching']['wins'] = $row['nrw'];
			$record['pitching']['losses'] = $row['nrl'];
			$record['pitching']['appearences'] = $row['nrapp'];
			$record['pitching']['gamesStarted'] = $row['nrgs'];
			$record['pitching']['completeGames'] = $row['nrcg'];
			$record['pitching']['shutOuts'] = $row['nrsho'];
			$record['pitching']['saves'] = $row['nrsv'];
			$record['pitching']['inningsPitched'] = $row['nrip'];
			$record['pitching']['hits'] = $row['nrh'];
			$record['pitching']['runs'] = $row['nrr'];
			$record['pitching']['earnedRuns'] = $row['nrer'];
			$record['pitching']['baseOnBalls'] = $row['nrbb'];
			$record['pitching']['strikeOuts'] = $row['nrso'];
			$record['pitching']['doubles'] = $row['nr2b'];
			$record['pitching']['triples'] = $row['nr3b'];
			$record['pitching']['homeRuns'] = $row['nrhr'];
			$record['pitching']['atBats'] = $row['nrab'];
			$record['pitching']['opponentAverage'] = $row['nroppavg'];
			$record['pitching']['wildPitches'] = $row['nrwp'];
			$record['pitching']['hitByPitch'] = $row['nrhbp'];
			$record['pitching']['balks'] = $row['nrbk'];
			$record['pitching']['earnedRunAverage'] = $row['nrera'];
			$this->_collection[] = $record;
		}
		return $this->_collection;
	}
}
?>