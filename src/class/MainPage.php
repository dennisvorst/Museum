<?php

//require_once "Log.php";

class MainPage{
	protected $_log;
	protected $_debug = true;

	/* constructor */
	function __construct(){
		$this->_log = new Log("museum.log");
	}

	function getMain($nmCurrentTab, $nrCurrentPage){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}
		/* create a page that fits in the main content part of the site */
		$html = "<!-- getMain -->\n";
		$html .= "<div class='art-layout-cell art-content'>\n";
		$html .= "<!-- Include the different classes here -->\n";
		$html .= "<article class='art-post art-article'>\n";
		$html .= $this->getContent($nmCurrentTab, $nrCurrentPage);
		$html .= "</article>\n";
		$html .= "</div>\n";

		$html .= "<!-- end getMain -->\n";

		return $html;
	}

	protected function _getContent($nmCurrentTab, $nrCurrentPage){
		/* get the left side of the main page */
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}
	}

	function getMenu(){
		/* fill the right side of the page with easy accessible menu items */
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}
	}
}
?>