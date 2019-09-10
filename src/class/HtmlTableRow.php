<?php 
require_once "Html.php";
require_once "HtmlTableCell.php";

class HtmlTableRow extends Html{
	protected $_tag = "tr";
	protected $_cells = [];
	protected $_isHeader = false;

	/* constructor */
	function __construct(array $cells, bool $isHeader = false){
		$this->_isHeader = $isHeader;
		foreach ($cells as $cell)
		{
			$this->_cells[] = new HtmlTableCell((empty($cell) ? "" : $cell), [], $this->_isHeader);
		}
	}

	function getElement() : string
	{
		/* create the content */
		$content = "";
		foreach ($this->_cells as $cell)
		{
			$content .= $cell->getElement();
		}
		/* enclose it */
		return $this->_encloseTags($content) . "\n";
	}
}