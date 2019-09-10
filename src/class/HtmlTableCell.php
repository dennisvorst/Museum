<?php
require_once "Html.php";

class HtmlTableCell extends Html
{
	protected $_isHeader = false;

	function __construct(string $content, array $attributes = null, bool $isHeader = null)
	{
		$this->_content = $content;
		$this->_isHeader = $isHeader;
		$this->_tag = $this->_getTag();
	}

	protected function _getTag() : string 
	{
		$this->_tag = "td";
		if ($this->_isHeader)
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