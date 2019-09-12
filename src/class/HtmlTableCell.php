<?php
require_once "Html.php";

class HtmlTableCell extends Html
{
	protected $_type;

	function __construct(string $content, array $attributes = null, string $type = null)
	{
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

	public function getCell() : string
	{
		$html = "<" . $this->_tagName . ">" . $this->_value . "</" . $this->_tagName . ">";
		return $html;
	}
}