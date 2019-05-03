<?php
require_once "Database.php";

class MainPage extends Database{

	/* constructor */
	function __construct(){
		parent::__construct();
	}

	function getMain($nmCurrentTab, $nrCurrentPage){
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

	function getContent($nmCurrentTab, $nrCurrentPage){
		/* get the left side of the main page */
	}

	function getMenu(){
		/* fill the right side of the page with easy accessible menu items */
	}
}
?>