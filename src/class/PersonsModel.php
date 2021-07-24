<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class PersonsModel implements iListModel
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
				FROM persons
   				WHERE is_featured = 1
				ORDER BY nmlast";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}


	function getRecordsByYear(int $year) : array
	{
		throw new exception("To be implemented");
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		$letter .= "%";

		$sql = "SELECT *
		FROM persons
		WHERE nmlast LIKE ?
		ORDER BY nmlast";

		$rows = $this->_db->select($sql, "s", [$letter]);
		return $this->_getCollection($rows);
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("To be implemented");
	}


	function getHofRecords() : array
	{
		$sql = "SELECT *
		FROM persons
		WHERE dthof IS NOT NULL
		ORDER BY dthof";

		$rows = $this->_db->select($sql);
		return $this->_getCollection($rows);
	}


	/** subsection selects */
	function getArticleRecords(int $id) : array
	{
		$sql = "SELECT p.*
		FROM persons p, personarticles pa
		WHERE p.idperson = pa.idperson
		AND pa.idarticle = ?
		ORDER BY nmlast";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	function getClubRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


    function getPersonalRecords(int $id) : array
	{
		throw new exception("Not required for Persons");
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
			$person = [];			

			$person['id']			= $row['idperson'];
			$person['firstName']	= $row['nmfirst'];
			$person['surName']		= $row['nmsur'];
			$person['lastName']		= $row['nmlast'];

			$person['nickName']		= $row['nmnick'];
			$person['gender']		= $row['cdgender'];
			$person['birthDate']	= $row['dtbirth'];
			$person['countryCode']	= $row['cdcountry'];
			$person['isDead']		= $row['hasdied'];

			if (!empty($row['dthof']))
			{
				$person['hallOfFame']['date']			= $row['dthof'];
				if (!empty($row['idphotohof']))
				{
					$person['hallOfFame']['photo']['id']	= $row['idphotohof'];
				}
			}

			$person['biography']	= $row['ftbiography'];
			$person['person'] 		= $person;

			/** get the mugshots */
			$photosModel = new PhotosModel($this->_db, $this->_log);
			$person['photos'] = $photosModel->getPersonMugshots($person['id']);

			$this->_collection[] = $person;
		}
		return $this->_collection;
	}
}
?>