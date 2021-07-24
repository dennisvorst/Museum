<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once("HtmlTabElement.php");

class HtmlTabPage
{
	protected $_tabs = [];

	/* constructor */
	function __construct()
	{
	}


	function add(HtmlTabElement $tab) : void
	{
		$this->_tabs[] = $tab;
	}


	function show() : string 
	{
		/** collect */
		$strip = "";
		$content = "";

		foreach ($this->_tabs as $tab)
		{
			$strip .= $tab->showTab();
			$content .= $tab->showContent();
		}

		/** create */
		return "
			<nav>
				<div class='nav nav-tabs' id='nav-tab' role='tablist'>
					{$strip}
				</div>
			</nav>
			<div class='tab-content' id='nav-tabContent'>
				{$content}
			</div>
	  ";
	}
}

