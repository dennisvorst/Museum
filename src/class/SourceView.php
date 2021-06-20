<?php
require_once "iView.php";


class SourceView implements iView
{
	protected $_path	= "./images/sources/";

	protected $_searchName;
	protected $_sourceName;
	protected $_website;


	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Source is mandatory");
		}

		/** create the object */
		$object = json_decode($json);

		$this->_id = $object->id;
		$this->_searchName = $object->nmsearch;
		$this->_sourceName = $object->nmsource;

		/** optionals */
		$this->_website = (isset($object->ftwebsite) ? $object->ftwebsite : null);
	}

	/** used for the photos */
	function showThumbnail() : string
	{
		return $this->_getSourceUrl();		
	}

	/** used for the articles */
	function show() : string
	{
		return "<img border='0' src='{$this->_path}{$this->_searchName}.jpg'>";
	}

	protected function _getSourceUrl() : string
	{
		$html = $this->_sourceName;
		if (!empty($this->_website))
		{
			$html = "<a href='{$this->_website}' target='_new' >{$this->_sourceName}</a>";
		}
		return $html;
	}
}
?>