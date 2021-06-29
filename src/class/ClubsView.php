<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "MediaView.php";
require_once "Social.php";
require_once "ClubView.php";

class ClubsView
{
  protected $_collection = [];

	function __construct(array $rows)
	{
    foreach ($rows as $row)
    {
      $object = new ClubView($row);
      $this->_collection[] = $object->showThumbnail();
    }
	}


	function show() : string
	{
    /** prepare */
    $object = new  HtmlGrid();
    $html = $object->createGrid($this->_collection, 3);

    /** create */
    return "
      <h1>Clubs</h1>

      {$html}
    ";
	}
}
?>