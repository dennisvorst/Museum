<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iListModel.php";

class ArticlesModel implements iListModel
{

	protected $_articlesCollection		= [];

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
		// $sql = "SELECT a.idarticle, fttitle1, a.dtpublish, nmauthor, ftarticle, min(ap.idphoto) AS idphoto, p.ftdescription
		// 		FROM articles a
   		// 		LEFT JOIN articlephotos ap ON ap.idarticle = a.idarticle
   		// 		LEFT JOIN photos p ON p.idphoto = ap.idphoto
   		// 		WHERE a.is_featured = 1
		// 		GROUP BY a.idarticle";

		$sql = "SELECT a.idarticle, fttitle1, a.dtpublish, nmauthor, ftarticle, min(ap.idphoto) AS idphoto, ap.ftdescription
				FROM articles a
   				LEFT JOIN articlephotos ap ON ap.idarticle = a.idarticle
   				WHERE a.is_featured = 1
				GROUP BY a.idarticle";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getCollection($rows);
	}
	

	/** get the articles of a specific year */
	function getRecordsByYear(int $year) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, a.dtpublish, nmauthor, ftarticle, min(ap.idphoto) AS idphoto, ap.ftdescription
				FROM articles a
		   		LEFT JOIN articlephotos ap ON ap.idarticle = a.idarticle
				WHERE a.nryear = ?
				GROUP BY a.idarticle";

		$rows = $this->_db->select($sql, "i", [$year]);
		return $this->_getCollection($rows);
	}


	function getRecordsByAlphabet(string $letter) : array
	{
		throw new exception("Not required for articles");
	}


	/** get the articles of a specific date */
	function getRecordsByDate(string $date) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM articles a 
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE dtpublsh = ?";

		$rows = $this->_db->select($sql, "s", [$date]);
		return $this->_getCollection($rows);
	}


	function getArticleRecords(int $id) : array
	{
		throw new exception("Not required for articles");
	}


	function getClubRecords(int $id) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM clubarticles ac, articles a 
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE a.idarticle = ac.idarticle 
				AND ac.idclub = ? 
				ORDER BY a.dtpublish 
				LIMIT ? OFFSET ?";

		$rows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);
		return $this->_getCollection($rows);
	}


	function getPersonalRecords(int $id) : array 
	{
		$sql = "SELECT a.*
				FROM personarticles pa, articles a
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE a.idarticle = pa.idarticle
				AND pa.idperson = ?
				ORDER BY a.dtpublish";
				// LIMIT ? OFFSET ?";

			$rows = $this->_db->select($sql, "i", [$id]);
			return $this->_getCollection($rows);
	}


    function getPhotoRecords(int $id) : array
	{
		return [];
	}


    function getVideoRecords(int $id) : array
	{
		return [];
	}


	protected function _getCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_articlesCollection = [];
		foreach ($rows as $row)
		{
			$article = [];

			$article['article']['id'] = $row['idarticle'];
			$article['article']['mainTitle'] = $row['fttitle1'];
			$article['article']['publishDate'] = $row['dtpublish'];
			$article['article']['authorName'] = $row['nmauthor'];
			$article['article']['text'] = $row['ftarticle'];

			if (isset($row['idphoto']))
			{
				$article['photos'][0] = ['id' => $row['idphoto'], 'subscript' => $row['ftdescription']];
			}

			$this->_articlesCollection[] = $article;
		}
		return $this->_articlesCollection;
	}
}
?>