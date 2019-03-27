<?php
require_once "SingleItemPage.php";

class Stat extends SingleItemPage{

	function __construct() {
		parent::__construct();
	}

	function processRecord(){
	}

	function getContent($nmCurrentTab, $nrCurrentPage){
		/*******************
		 gather the data
		 *******************/

		/*******************
		 create the content
		 *******************/
		$html = "";

		/*******************
		 search and display the additional information
		 *******************/

		return $html;
	}// getContent
}
?>