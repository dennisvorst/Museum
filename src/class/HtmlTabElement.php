<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class HtmlTabElement{

	protected $_reference; 
	protected $_title; 
	protected $_content; 
	protected $_isActive = false;

	function __construct(string $reference, string $title, string $content, bool $isActive = null)
	{
		/** mandatory values */
		if (empty($reference))	{throw new InvalidArgumentException('HtmlTabElement: reference not allowed to be empty.');} 
		if (empty($title))		{throw new InvalidArgumentException('HtmlTabElement: title not allowed to be empty.');} 
		if (empty($content))	{throw new InvalidArgumentException('HtmlTabElement: content not allowed to be empty.');} 

		/** transfer */
		$this->_reference = $reference;
		$this->_title = $title;
		$this->_content = $content;
		$this->_isActive = (isset($isActive) ? $isActive : false);
	}


	function showTab() : string
	{
		$active = ($this->isActive() ? " active" : "");
		return "
		<button class='nav-link{$active}' id='nav-{$this->_reference}-tab' data-bs-toggle='tab' data-bs-target='#nav-{$this->_reference}' type='button' role='tab' aria-controls='nav-{$this->_reference}' aria-selected='true'>{$this->_title}</button>";
	}


	function showContent() : string 
	{
		$active = ($this->isActive() ? " show active" : "");
		return "
		<div class='tab-pane fade{$active}' id='nav-{$this->_reference}' role='tabpanel' aria-labelledby='nav-{$this->_reference}-tab'>{$this->_content}</div>";
	}


	function isActive() : bool 
	{
		return $this->_isActive;
	}	
}
?>
