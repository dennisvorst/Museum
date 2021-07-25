<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "PersonView.php";

class PersonsView extends ListView implements iListView
{
	protected $_title = "Personen";
	protected $_columnCount = 3;

	function __construct(array $rows)
	{
		parent::__construct();

		foreach ($rows as $row)
		{
			$this->_collection[] = new PersonView($row);
		}
	}

	function showArticlePage()
	{
		$this->_title = "Personen in het artikel";
		return $this->show();
	}
}
?>