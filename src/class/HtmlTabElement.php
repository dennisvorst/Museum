<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class HtmlTabElement{
	private $_reference; 
	private $_title; 
	private $_content; 
	private $_isActive = false;

	function __construct(string $reference, string $title, string $content, boolean $isActive = NULL)
	{
		$this->_reference = $reference;
		$this->_title = $title;
		$this->_content = $content;
		IF (!empty($isActive))
		{
			$this->_isActive = $isActive;
		}
	}

	function getTabButton(){
		$html = "";
		if ($this->isActive()){
			$html .= "<li class='active'><a data-toggle='tab' href='#" . $this->_reference . "'>" . $this->_title . "</a></li>\n";
		} else {
			$html .= "<li><a data-toggle='tab' href='#" . $this->_reference . "'>" . $this->_title . "</a></li>\n";
		}

		return $html;
	}
	function getTabBContent(){
		$html = "";
		if ($this->isActive()){
			$html .= "<div id='" . $this->_reference . "' class='tab active'>\n" . $this->_content . "</div>\n";
		} else {
			$html .= "<div id='" . $this->_reference . "' class='tab'>\n" . $this->_content . "</div>\n";
		}
	}
	function isActive(){
		return $this->_isActive;
	}
}
?>
