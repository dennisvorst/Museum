<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iListView.php";
require_once "ListView.php";
require_once "PhotoView.php";

class PhotosView extends ListView implements iListView
{
	protected $_title = "Foto's";
	protected $_columnCount = 3;

	function __construct(array $rows)
	{
		parent::__construct();

		foreach ($rows as $row)
		{
			$object = new PhotoView($row);
			$this->_collection[] = $object->showThumbnail();
		}
	}

	
	function showPersonalPhotos()
	{
		$this->_title = "Foto's van deze persoon";
		return $this->show();
	}
}
?>