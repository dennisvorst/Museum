<?php
require_once "SingleItemPage.php";
require_once "MysqlDatabase.php";

class Stat extends SingleItemPage{

	function __construct(MysqlDatabase $db){
		parent::__construct($db);
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