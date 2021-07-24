<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "PersonView.php";

class HallOfFamersView extends ListView implements iListView
{
  protected $_title = "Eregalerij";
  protected $_columnCount = 1;
  protected $_body;
  
	function __construct(array $rows)
	{
		parent::__construct();

		$persons = [];
		foreach ($rows as $row)
		{
			$hof = $row['hallOfFame'];
			$date = $hof['date'];


			$dateObj = new Date();
			$row['hallOfFame']['date'] = $dateObj->translateDate($row['hallOfFame']['date'], "D");

			$persons[] = $row;
		}

		$date = "";
		foreach ($persons as $row)
		{
			if (empty($date) || $date !== $row['hallOfFame']['date']) 
			{
				$this->_body .= "<h3>Toegelaten op {$row['hallOfFame']['date']}</h3>\n";
				$date = $row['hallOfFame']['date'];
			}
			$object = new PersonView($row);
			$this->_body .= $object->showHofThumbnail();
		}
	}

	/** overriden */
	public function show() : string
	{

		/** create */
		return "
		<h1>{$this->_title}</h1>

		{$this->_body}
		";
	}
  
}
?>