<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";
require_once "PhotosModel.php";

class PersonModel implements iPageModel{

	/** collections */
	protected $_photoCollection = [];
	protected $_articleCollection = [];
	protected $_videoCollection = [];

//	protected $_idphotohof;
	protected $_mugshot;

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		// $sql = "SELECT * FROM persons p
		// 		LEFT JOIN photos pp ON p.idphotohof = pp.idphoto
		// 		WHERE idperson = ?";
		$sql = "SELECT * FROM persons 
				WHERE idperson = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			/** person */
			$this->_result['id'] = $row['idperson'];

			$this->_result['firstName']	= $row['nmfirst'];
			$this->_result['surName']	= $row['nmsur'];
			$this->_result['lastName']	= $row['nmlast'];

			$this->_result['halloffame']['date'] = $row['dthof'];
			$this->_result['halloffame']['id'] = $row['idphotohof'];

			/* look for the hall off fame photo */
			if (isset($row['idphotohof']) && !empty($row['idphotohof']))
			{
				$this->_result['halloffame']['photo'] = $this->_getHofPhoto($row['idphotohof']);
			}

			/* look for a photo */
			$this->_result['photos'] = $this->_getPhotoCollection($this->_id);
   
			/* look for clubs */
			$this->_result['articles'] = $this->_getArticleCollection($this->_id);
		}
	}


	function getData() : array
	{
		return $this->_result;
	}


	protected function _getHofPhoto(int $id) : array
	{
		$model = new PhotoModel($this->_db, $this->_log, $id);
		return $model->getData();
	}

	/** collections */
	protected function _getPhotoCollection() : array
	{
		$model = new PhotosModel($this->_db, $this->_log);
		$rows = $model->getPersonRecords($this->_id);
		foreach ($rows as $row)
		{
			if (empty($this->_mugshot && $row['isMugshot']))
			{
				$this->_mugshot = $row;
			}
		}
		return $rows;
	}


	protected function _getArticleCollection() : array
	{
		$model = new ArticlesModel($this->_db, $this->_log);
		return $model->getPersonRecords($this->_id);
	}


}
?>