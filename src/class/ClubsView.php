<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "ClubView.php";

class ClubsView extends ListView implements iListView
{
  protected $_title = "Clubs";
  protected $_columnCount = 3;
  
	function __construct(array $rows)
	{
		parent::__construct();

		foreach ($rows as $row)
		{
		  $this->_collection[] = new ClubView($row);
		}
	}

	function showArticlePage()
	{
		$this->_title = "Verenigingen in het artikel";
		return $this->show();
	}
}
?>