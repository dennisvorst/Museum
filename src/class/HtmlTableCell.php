<?php
require_once "Html.php";

class HtmlTableCell extends Html
{
	protected $_type;
	protected $_allowedAttr = ["colspan", "rowspan", "headers"];

	function __construct(string $content = null, array $attributes = null, string $type = null)
	{
		/* move to parent class later. */
		$this->_allowedAttr = $this->_getAllowedAllAttr();
		$this->_attributes = $this->_setAttributes($attributes);

		$this->_content = $content;
		$this->_type = $type;
		$this->_tag = $this->_getTag();
	}

	protected function _getTag() : string 
	{
		$this->_tag = "td";
		if ($this->_type == "H")
		{
			$this->_tag = "th";
		}
		return $this->_tag;
	}
}