<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "MediaView.php";
require_once "Social.php";
require_once "PersonView.php";

class ArticlesView
{
  protected $_articlesCollection = [];

	function __construct(array $rows)
	{
    foreach ($rows as $row)
    {
      $object = new ArticleView($row);
      $this->_articlesCollection[] = $object->showThumbnail();
    }
	}


	function show() : string
	{
    /** prepare */
    $object = new  HtmlGrid();
    $html = $object->createGrid($this->_articlesCollection, 1);

    /** create */
    return "
      <h1>Artikelen</h1>

      {$html}
    ";
	}
}
?>