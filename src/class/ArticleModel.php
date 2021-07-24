<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iPageModel.php";

require_once "PersonsModel.php";
require_once "ClubsModel.php";

class ArticleModel implements iPageModel
{
	protected $_debug;

	protected $_db;
	protected $_log;
	protected $_id;

	protected $_result;

	protected $_articleText;
	protected $_authorName;
	protected $_mainTitle;
	protected $_publishDate;
	protected $_subTitle;
	protected $_subSubTitle;

	/** collections */
	protected $_photoCollection		= [];
	protected $_personCollection	= [];
	protected $_clubCollection		= [];
	protected $_competitionCollection	= [];

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		/** init */
		$this->_db = $db;
		$this->_log = $log;
		$this->_id = $id;

		$sql = "SELECT * FROM articles WHERE idarticle = ?";
		$row = $this->_db->select($sql, "i", [$this->_id]);

		if (!empty($row))
		{
			$row = $row[0];

			$this->_result['article']['id'] = $row['idarticle'];;
			$this->_result['article']['mainTitle'] = $row['fttitle1'];
			$this->_result['article']['publishDate'] = $row['dtpublish'];
			$this->_result['article']['authorName'] = $row['nmauthor'];
			$this->_result['article']['text'] = $row['ftarticle'];
			
			/* look for a photo */
			$this->_result['photos'] = $this->_getPhotoCollection($this->_id);
   
			/* look for persons */
			$this->_result['persons'] = $this->_getPersonCollection($this->_id);

			/* look for clubs */
			$this->_result['clubs'] = $this->_getClubCollection($this->_id);

			/* look for videos */
			$this->_result['videos'] = $this->_getVideoCollection($this->_id);
		}
	}

	function getData() : array
	{
		return $this->_result;
	}

	protected function _getPhotoCollection(int $id) : array
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* set the photo is based on the newspaper article id */
		if (empty($this->_photoCollection)) 
		{
			$this->_photoCollection = [];

			$sql	= "SELECT p.* FROM articlephotos ap, photos p WHERE ap.idphoto = p.idphoto AND ap.idarticle = ?";
			$rows	= $this->_db->select($sql, "i", [$id]);
			if (!empty($rows)){
				foreach($rows as $row)
				{
					$photo = [];

					$photo['id']	= $row['idphoto'];
//					$photo['image'] = $this->_id . ".jpg";
					$photo['subscript'] = $row['ftdescription'];
					$photo['isMugshot'] = $row['idmugshot'];

					$json['source']['id'] = $row['idsource'];

					
					$this->_photoCollection[] = $photo;
				}
			}
		}
		return $this->_photoCollection;
	}

	protected function _getPersonCollection() : array 
	{
		$model = new PersonsModel($this->_db, $this->_log);
		return $model->getArticleRecords($this->_id);
	}


	protected function _getClubCollection() : array
	{
		$model = new ClubsModel($this->_db, $this->_log);
		return $model->getArticleRecords($this->_id);
	}

	protected function _getVideoCollection() : array
	{
		$model = new VideosModel($this->_db, $this->_log);
		return $model->getArticleRecords($this->_id);
	}
}
?>