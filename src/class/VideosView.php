<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "ListView.php";
require_once "iListView.php";
require_once "VideoView.php";

class VideosView extends ListView implements iListView
{
	protected $_title = "Video's";
	protected $_columnCount = 3;

	protected $_collection = [];

	function __construct(array $rows)
	{
		parent::__construct();

		foreach ($rows as $row)
		{
			$object = new VideoView($row);
			$this->_collection[] = $object->showThumbnail();
		}
	}
}
?>