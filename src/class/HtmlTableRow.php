<?php 
require_once "Html.php";
require_once "HtmlTableCell.php";

class HtmlTableRow extends Html{
	protected $_cells = [];
	protected $_type;

	/* constructor */
	function __construct(array $cells, array $attributes = null, string $type = null){
		parent::__construct("tr");

		$this->_allowedAttr = $this->_getAllowedAllAttr();
		$this->_attributes = $this->_setAttributes($attributes);

		$this->_type = $type;
		foreach ($cells as $cell)
		{
			$this->_cells[] = new HtmlTableCell((empty($cell) ? "" : $cell), [], $this->_type);
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