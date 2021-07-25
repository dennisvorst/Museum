<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "CompetitionView.php";

class CompetitionsView extends ListView implements iListView
{
  protected $_title = "Competities";
  protected $_columnCount = 1;
  
	function __construct(array $rows)
	{
		parent::__construct();

		foreach ($rows as $row)
		{
			$this->_collection[] = new CompetitionView($row);
		}
	}
}
?>