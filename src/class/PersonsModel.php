<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iModel.php";

class PersonsModel
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


	function getArticlePersons(int $id) : array
	{
		$sql = "SELECT p.*
		FROM persons p, personarticles pa
		WHERE p.idperson = pa.idperson
		AND pa.idarticle = ?
		ORDER BY nmlast";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_collection = [];
		foreach ($rows as $row)
		{
			$person['id']			= $row['idperson'];
			$person['firstName']	= $row['nmfirst'];
			$person['surName']		= $row['nmsur'];
			$person['lastName']		= $row['nmlast'];

			$person['person'] = $person;

			$this->_collection[] = $person;
		}
		return $this->_collection;
	}
}
?>