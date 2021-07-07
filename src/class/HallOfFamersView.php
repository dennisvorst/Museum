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

    $date = "";
    foreach ($rows as $row)
    {
      $date = $row['hallOfFameDate'];
      $dateObj = new Date();
      $row['hallOfFameDate'] = $dateObj->translateDate($row['hallOfFameDate'], "D");
    }

    foreach ($rows as $row)
    {
      if (empty($date) || $date !== $row['hallOfFameDate']) 
      {
        $this->_body .= "<h3>{$row['hallOfFameDate']}</h3>\n";
        $date = $row['hallOfFameDate'];
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