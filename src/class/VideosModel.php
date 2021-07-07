<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class VideosModel implements iListModel
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
		$sql = "SELECT *
				FROM videos
   				WHERE is_featured = 1
				ORDER BY nmvideo";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}


	function getRecordsByYear(int $year) : array
	{
		throw new exception("Not required for videos");
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		$letter .= "%";

		$sql = "SELECT * 
				FROM videos 
				WHERE nmvideo LIKE ?";

		$rows = $this->_db->select($sql, "s", [$letter]);
		return $this->_getCollection($rows);
	}


	function getRecordsByDate(string $date) : array
	{
		throw new exception("To be implemented");
	}


	function getArticleRecords(int $id) : array
	{
		throw new exception("To be implemented");
	}


	function getClubRecords(int $id) : array
	{
		throw new exception("Not required for clubs");
	}


    function getPersonRecords(int $id) : array
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
			$video = [];

			$video['id']		= $row['idvideo'];
			$video['name']		= $row['nmvideo'];
			$video['url']		= $row['nmurl'];

			$video['video'] = $video;

			$this->_collection[] = $video;
		}
		return $this->_collection;
	}
}
?>