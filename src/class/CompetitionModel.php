<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

require_once "ParticipantsModel.php";
require_once "GamesModel.php";

class CompetitionModel implements iPageModel
{
	protected $_db;
	protected $_log;
	protected $_id;

	protected $_name;

	protected $_participantCollection = [];
	protected $_gameCollection = [];

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM competitions WHERE idcompetition = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			$this->_result['id']	= $row['idcompetition'];;
			$this->_result['name']	= $row['nmcompetition'];
			$this->_result['sub']	= $row['nmsub'];

			/** get the participants */
			$this->_result['participants'] = $this->_getParticipantCollection($this->_id);

			/** get the games */
			$this->_result['games'] = $this->_getGamesCollection($this->_id);
		}
	}


	function getData() : array
	{
		return $this->_result;
	}


	protected function _getParticipantCollection() : array 
	{
		$model = new ParticipantsModel($this->_db, $this->_log);
		return $model->getCompetitionRecords($this->_id);
	}


	protected function _getGamesCollection() : array
	{
		$model = new GamesModel($this->_db, $this->_log);
		return $model->getCompetitionRecords($this->_id);
	}
}
?>