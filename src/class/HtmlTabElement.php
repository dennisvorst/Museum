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

	function getTabButton() : string 
	{

		$active = ($this->isActive() ? " active" : "");
		$area_selected = ($this->isActive() ? "true" : "false");

		return "<li class='nav-item'>
			<a class='nav-link{$active}' id='{$this->_reference}-tab' data-toggle='tab' href='#{$this->_reference}' role='tab' aria-controls='{$this->_reference}' aria-selected='{$area_selected}'>{$this->_title}</a>
		</li>";
	}
	function getTabContent() : string {
		$active = ($this->isActive() ? " show active" : "");

		return "
		<div class='tab-pane fade{$active}' id='{$this->_reference}' role='tabpanel' aria-labelledby='{$this->_reference}-tab'>
			{$this->_content}
		</div>";
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
