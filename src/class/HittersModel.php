<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class HittersModel implements iListModel
{

	protected $_collection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}

    function getPersonalRecords(int $id) : array
	{
		$sql = "SELECT * 
			FROM hitting
			WHERE idperson = ?";
		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
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
	

	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_articlesCollection = [];
		foreach ($rows as $row)
		{
			$record = [];

			$record['hitting']['id'] = $row['idhitting'];
			$record['hitting']['idperson'] = $row['idperson'];

			$record['hitting']['idteam'] = $row['idteam'];

			$record['hitting']['year'] = $row['nryear'];
			$record['hitting']['battingAverage'] = $row['nravg'];
			$record['hitting']['gamesPlayed'] = $row['nrgp'];
			$record['hitting']['gamesStarted'] = $row['nrgs'];
			$record['hitting']['atBats'] = $row['nrab'];
			$record['hitting']['runs'] = $row['nrr'];
			$record['hitting']['hits'] = $row['nrh'];
			$record['hitting']['doubles'] = $row['nr2b'];
			$record['hitting']['triples'] = $row['nr3b'];
			$record['hitting']['homeRuns'] = $row['nrhr'];
			$record['hitting']['runsBattedIn'] = $row['nrrbi'];
			$record['hitting']['totalBases'] = $row['nrtb'];
			$record['hitting']['sluggingPercentage'] = $row['nrslgperc'];
			$record['hitting']['baseOnBalls'] = $row['nrbb'];
			$record['hitting']['hitByPitch'] = $row['nrhbp'];
			$record['hitting']['strikeOuts'] = $row['nrso'];
			$record['hitting']['groundedIntoDoublePlay'] = $row['nrgdp'];
			$record['hitting']['onBasePercentage'] = $row['nrobperc'];
			$record['hitting']['sacrificeFlies'] = $row['nrsf'];
			$record['hitting']['sacrificeHits'] = $row['nrsh'];
			$record['hitting']['stolenBases'] = $row['nrsb'];
			$record['hitting']['stealAttempts'] = $row['nratt'];

			$this->_collection[] = $record;
		}
		return $this->_collection;
	}
}
?>