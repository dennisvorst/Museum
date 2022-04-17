<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "PageView.php";

class SourceView extends PageView implements iPageView
{
	/* constructor */

	protected $_id; 
	protected $_url;
	protected $_name;
	protected $_searchName;
	protected $_logo;

	protected $_path = "../db/images/sources/";
	
	function __construct(array $row)
	{
		if (empty($row) | !isset($row['source']) | !isset($row['source']['id']))
		{
			throw new InvalidArgumentException("source is mandatory");
		}

		$this->_result = $this->_formatData($row);

		/** create the object */
		$source = $this->_result['source'];

		$this->_id = $source['id'];
		$this->_name = $source['sourceName'];
		$this->_searchName = $source['searchName'];
		$this->_logo = $source['sourceLogo'];
		$this->_sourceUrl = $source['sourceUrl'];

		$this->_url = $this->_getUrl(["option" => "source", "id" => $this->_id]);


		/** optional values */
//		$this->_alignment = (property_exists($object, "alignment") ? $object->alignment : null);
	}

	function showThumbnail() : string
	{
		return "
		<div class='card'>
				tbd
		</div>";
	}

	function show() : string
	{
		/** prepare */

		/** create the tabs  */
		$tabs = $this->_showTabs();

		/** show */

		return "
		<h1>Source tbd</h1>
		";
	}

	protected function _formatData(array $row) : array
	{
		$searchName = $row['source']['searchName'];
		$row['source']['sourceLogo'] = $this->_path . $searchName . ".jpg";

		return $row;
	}

	function getFormattedData() : array
	{
//		print_r($this->_result);
		return $this->_result;
	}
}
?>