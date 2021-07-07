<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************

require_once "ArticlesModel.php";
require_once "ClubsModel.php";
require_once "PersonsModel.php";
require_once "PhotosModel.php";
require_once "VideosModel.php";

class HomeModel
{
	protected $_collection	= [];

	protected $_articlesCollection	= [];
	protected $_clubsCollection		= [];
	protected $_personsCollection	= [];
	protected $_photosCollection	= [];
	protected $_videosCollection	= [];

	protected $_db;
	protected $_log;

	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;

		/** Articles */
		$model = new ArticlesModel($db, $log);
		$this->_articlesCollection	= $model->getFeatured();

		/** Clubs */
		$model = new ClubsModel($db, $log);
		$this->_clubsCollection		= $model->getFeatured();

		/** Persons */
		$model = new PersonsModel($db, $log);
		$this->_personsCollection	= $model->getFeatured();

		/** Photos */
		$model = new PhotosModel($db, $log);
		$this->_photosCollection	= $model->getFeatured();

		/** Videos */
		$model = new VideosModel($db, $log);
		$this->_videosCollection	= $model->getFeatured();
	}

	function getFeatured() : array
	{
		$this->_collection['articles'] = $this->_articlesCollection;
		$this->_collection['clubs'] = $this->_clubsCollection;
		$this->_collection['persons'] = $this->_personsCollection;
		$this->_collection['photos'] = $this->_photosCollection;
		$this->_collection['videos'] = $this->_videosCollection;

		return $this->_collection;
	}
}
?>