<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "MediaView.php";
require_once "Social.php";
require_once "PersonView.php";

class PersonsView
{
  protected $_collection = [];

	function __construct(array $rows)
	{
//    $rows = json_decode($json);
    foreach ($rows as $row)
    {
      $object = new PersonView($row);
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
      <h1>Personen</h1>

      {$html}
    ";
	}
}
?>