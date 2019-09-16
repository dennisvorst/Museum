<?php

require_once "Html.php";
require_once "HtmlTableRow.php";
require_once "Html.php";

class HtmlTable extends Html
{
	protected $_header = [];
	protected $_footer = [];
	protected $_rows = [];

	/* constructor */
	function __construct(array $attributes = null){
		parent::__construct("table", $attributes);
	}

	/* deprecated */
	function createHtmlTable(array $header, array $rows, array $footer = null){
		/* process the data */
		$this->_header = new HtmlTableRow($header, true);

		foreach ($rows as $row)
		{
			$this->_rows[] = new HtmlTableRow($row, false);
		}

		if (!empty($footer)) $this->_footer = new HtmlTableRow($footer, false);

		/* create the html */ 
		return $this->getElement();
	}

	function addRow(HtmlTableRow $row, string $type = null) : void
	{
		switch ($type)
		{
			case "H":
				$this->_header = $row;
				break;

			case "F":
				$this->_footer = $row;
				break;
	
			default:	
				$this->_rows[] = $row;
		}
	}

	/* override */
	protected function _getContent() : string 
	{
		/* create the content */
		if (empty($this->_content)) 
		{
			$this->_content .= (empty($this->_header) ? "" : $this->_header->getElement());

			foreach($this->_rows as $row)
			{
				$this->_content .= $row->getElement();
			}

			$this->_content .= (empty($this->_footer) ? "" : $this->_footer->getElement());
		}
		return $this->_content;
	}
}