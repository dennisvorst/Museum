<?php

class HtmlTableCell
{
	var $_name;
	var $_value;
	var $_isHeader = false;
	var $_tagName = "td";

	function __construct(string $value, string $name = null, bool $isHeader = null)
	{
		$this->_name = $name;
		$this->_value = $value;
		$this->_isHeader = $isHeader;
		if ($this->_isHeader)
		{
			$this->_tagName = "th";
		}
	}

	public function getCell() : string
	{
		$html = "<" . $this->_tagName . ">" . $this->_value . "</" . $this->_tagName . ">";
		return $html;
	}
}