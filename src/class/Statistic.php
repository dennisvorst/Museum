<?php
require_once "SingleItemPage.php";
require_once "MysqlDatabase.php";

class Statistic extends SingleItemPage{

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
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