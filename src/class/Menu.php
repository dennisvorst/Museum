<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

/* include section */
//require_once 'MysqlDatabase.php';
require_once "HtmlGrid.php";

/** todo: pass mysql database as an object in the constructor*/
class Menu{
	protected $_version = "1.0.0";
//	protected $_db;

	/* constructor */
	function __construct(){
	}

	function getMainMenu(string $class = null) : string
	{
		/* return the main menu items */

		if(empty($class)){
			$class = "home";
		}
		
		/* create the menu list */
		$items["home"] = "Home";
		$items["articles"] = "Artikelen";
		$items["photos"] = "Foto's";
		$items["videos"] = "Video's";
		$items["clubs"] = "Clubs";
		$items["persons"] = "Personen";
		$items["halloffamers"] = "Eregalerij";
		$items["competitions"] = "Competities";
		$items["contact"] = "Contact";

		$html = "";
		foreach ($items as $key => $value){
			$href = "index.php?option=" . $key;

			$active = ""; 
			if ($key === $class)
			{
				$active = " active";
			}
			$html .= "<li class='nav-item'><a class='nav-link{$active}' aria-current='page' href='{$href}'>{$value}</a></li>\n";


		}

		/** bootstrap */
		$html	= "<div>Versie: " . $this->_version . "</div>\n<ul class='nav flex-column'>\n{$html}</ul>\n";

		
		return $html;
	}
}
?>
