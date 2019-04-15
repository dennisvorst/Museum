<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class HtmlTabElement{
	private $_reference; 
	private $_title; 
	private $_content; 
	private $_isActive = false;

	function __construct(string $reference, string $title, string $content, bool $isActive = null)
	{
		if (empty($reference))	{throw new InvalidArgumentException('HtmlTabElement: reference not allowed to be empty.');} 
		if (empty($title))		{throw new InvalidArgumentException('HtmlTabElement: title not allowed to be empty.');} 
		if (empty($content))	{throw new InvalidArgumentException('HtmlTabElement: content not allowed to be empty.');} 
		
		$this->_reference = $reference;
		$this->_title = $title;
		$this->_content = $content;
		IF (!empty($isActive))
		{
			$this->_isActive = $isActive;
		}
	}

	function getTabButton() : string {
		$html = "";
		if ($this->isActive()){
			$html .= "<li class='active'><a data-toggle='tab' href='#" . $this->_reference . "'>" . $this->_title . "</a></li>\n";
		} else {
			$html .= "<li><a data-toggle='tab' href='#" . $this->_reference . "'>" . $this->_title . "</a></li>\n";
		}
		return $html;
	}
	function getTabContent() : string {
		$html = "";
		if ($this->isActive()){
			$html .= "<div id='" . $this->_reference . "' class='tab active'>\n" . $this->_content . "</div>\n";
		} else {
			$html .= "<div id='" . $this->_reference . "' class='tab'>\n" . $this->_content . "</div>\n";
		}
		return $html;
	}
	function isActive() : bool 
	{
		return $this->_isActive;
	}
	function setActive() : void
	{
		$this->_isActive = true;
	}
	function setInactive() : void
	{
		$this->_isActive = false;
	}
	function getReference() : string
	{
		return $this->_reference;
	}
}
?>
