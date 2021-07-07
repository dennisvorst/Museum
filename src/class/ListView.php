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
		/** if there are no records */
		if (empty($this->_collection))
		{
			return "";
		}

		/** init */
		if (empty($this->_title) || empty($this->_columnCount))
		{
			throw new exception("Mandatory parameters are empty.");
		}

		/** prepare */
		$object = new  BootstrapGrid($this->_collection, $this->_columnCount);
		$html = $object->show();

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