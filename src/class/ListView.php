<?php

require_once "BootstrapGrid.php";

class ListView
{
	protected $_title;
	protected $_columnCount;
	protected $_collectio;

	function __construct()
    {
    }

	function show() : string
	{
		/** init */
		if (empty($this->_title) || empty($this->_columnCount))
		{
			throw new exception("Mandatory parameters are empty.");
		}

		/** prepare */
		$html = "Geen ". strtolower($this->_title) . " gevonden";
		if (!empty($this->_collection))
		{
			$object = new  BootstrapGrid($this->_collection, $this->_columnCount);
			$html = $object->show();
		}
		

		/** create */
		return "
		<h1>{$this->_title}</h1>

		{$html}
		";
	}

	/** getters and setters */
    function setTitle(string $title)
	{
		$this->_title = $title;
	}
    function getTitle()
	{
		return $this->_title;
	}
}
?>