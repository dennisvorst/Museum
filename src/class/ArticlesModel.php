<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iModel.php";

class ArticlesModel
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
		$sql = "SELECT a.idarticle, fttitle1, a.dtpublish, nmauthor, ftarticle, min(ap.idphoto) AS idphoto, p.ftdescription
				FROM articles a
   				LEFT JOIN articlephotos ap ON ap.idarticle = a.idarticle
   				LEFT JOIN photos p ON p.idphoto = ap.idphoto
   				WHERE a.is_featured = 1
				GROUP BY a.idarticle";

		$rows = $this->_db->select($sql, "", []);
		return $this->_getArticlesCollection($rows);
	}
	

	/** get the articles of a specific year */
	function getYearArticles(int $year) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM articles a 
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE nryear = ?";

		$rows = $this->_db->select($sql, "i", [$date]);
		return $this->_getArticlesCollection($rows);
	}


	/** get the articles of a specific date */
	function getDateArticles(string $date) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM articles a 
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE dtpublsh = ?";

		$rows = $this->_db->select($sql, "s", [$date]);
		return $this->_getArticlesCollection($rows);
	}


	function getClubArticles(int $id) : array
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM clubarticles ac, articles a 
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE a.idarticle = ac.idarticle 
				AND ac.idclub = ? 
				ORDER BY a.dtpublish 
				LIMIT ? OFFSET ?";

		$rows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);
		return $this->_getArticlesCollection($rows);
	}


	function getPersonArticles(int $id) : array 
	{
		$sql = "SELECT a.idarticle, fttitle1, dtpublish, nmauthor, ftarticle, idphoto
				FROM personarticles ap, articles a
				LEFT JOIN articlephotos ap ON a.idarticle = ap.idarticle
				WHERE a.idarticle = ap.idarticle
				AND ap.idperson = ?
				ORDER BY a.dtpublish 
				LIMIT ? OFFSET ?";

		$rows = $this->_db->select($sql, "iii", [$id, $this->nrRecordsOnPage, $nrOffSet]);
		return $this->_getArticlesCollection($rows);
	}

	protected function _getArticlesCollection(array $rows) : array
	{
		/** add the properties we meed to create the thumbnail */
		$this->_articlesCollection = [];
		foreach ($rows as $row)
		{
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