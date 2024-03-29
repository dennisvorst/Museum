<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
//require_once "iListModel.php";

//class ParticipantsModel implements iListModel
class ParticipantsModel
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
				FROM participants
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
			$participant = [];
			
			$participant['id']		= $row['idparticipant'];

			$participant['participant'] = $participant;

			$this->_collection[] = $participant;
		}
		return $this->_collection;
	}
}
?>