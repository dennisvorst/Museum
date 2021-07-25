<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "ArticleView.php";

class ArticlesView extends ListView implements iListView
{
	protected $_title = "Artikelen";
	protected $_columnCount = 1;
	
	protected $_collection = [];

	function __construct(array $rows)
	{
		parent::__construct();
		foreach ($rows as $row)
		{
			$this->_collection[] = new ArticleView($row);
		}
	}


	// function showPersons()
	// {
	// 	$this->_title = "Personen genoemd in dit article";
	// }


	// function showClubs()
	// {
	// 	$this->_title = "Verenigingen genoemd in dit article";
	// }

	function showPersonalArticles()
	{
		$this->_title = "Artikelen van deze persoon";
		return $this->show();
	}
}
?>