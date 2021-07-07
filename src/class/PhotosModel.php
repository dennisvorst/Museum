<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class PhotosModel implements iListModel
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
				FROM photos
   				WHERE is_featured = 1
				ORDER BY dtpublish";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}


	function getRecordsByYear(int $year) : array
	{
		$sql = "SELECT *
		FROM photos 
		WHERE nryear = ?
		ORDER BY dtpublish";

		$rows = $this->_db->select($sql, "i", [$year]);
		return $this->_getCollection($rows);
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		throw new exception("To be implemented");
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("To be implemented");
	}

	function getMugshotRecords(int $id) : array
	{
		$sql = "SELECT * FROM photos p, personphotos pp
				WHERE p.idphoto = pp.idphoto
				AND p.idmugshot = ?
				AND idperson = ?";

		$rows = $this->_db->select($sql, "ii", [1, $id]);
		return $this->_getCollection($rows);
	}

	function getSingleRecordById(int $id) : array
	{
		$sql = "SELECT * FROM photos
				WHERE idphoto = ?";

		$rows = $this->_db->select($sql, "i", [$id]);

		return $this->_getCollection($rows);
	}

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
		$sql = "SELECT p.*
		FROM photos p, clubphotos cp 
		WHERE p.idphoto = cp.idphoto 
		AND cp.idclub = ?
		ORDER BY nryear, dtpublish";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
	}


    function getPersonRecords(int $id) : array
	{
		$sql = "SELECT p.*
		FROM photos p, personphotos pp 
		WHERE p.idphoto = pp.idphoto 
		AND pp.idperson = ?
		ORDER BY nryear, dtpublish";

		$rows = $this->_db->select($sql, "i", [$id]);
		return $this->_getCollection($rows);
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
			$photo = [];

			$photo['id']		= $row['idphoto'];
			$photo['subscript'] = $row['ftdescription'];
			$photo['isMugshot'] = $row['idmugshot'];

			$photo['source']['id'] = $row['idsource'];


			$photo['photo'] = $photo;

			$this->_collection[] = $photo;
		}
		return $this->_collection;
	}
}
?>