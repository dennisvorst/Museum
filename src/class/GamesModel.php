<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
//require_once "iListModel.php";

//class GamesModel implements iListModel
class GamesModel
{
	protected $_collection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}


	function getCompetitionRecords(int $id) : array
	{
		$sql = "SELECT * 
				FROM games
				WHERE idcompetition = ?";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_collection = [];
		foreach ($rows as $row)
		{
			$game = [];			

			$game['id']		= $row['idgame'];

			$game['game'] = $game;

			$this->_collection[] = $game;
		}
		return $this->_collection;
	}
}
?>