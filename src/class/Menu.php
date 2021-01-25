<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

/* include section */
//require_once 'MysqlDatabase.php';
require_once "HtmlGrid.php";

/** todo: pass mysql database as an object in the constructor*/
class Menu{
	protected $_version = "0.0.29";
//	protected $_db;

	/* constructor */
	function __construct(){
	}

	function getMainMenu($activeMenu){
		/* return the main menu items */
		if(empty($activeMenu)){
			$activeMenu = "home";
		}
		
		/* create the menu list */
		$menuItems[0] = array("idpart"=>"home", "valuepart"=>"Home");
		$menuItems[1] = array("idpart"=>"articles", "valuepart"=>"Artikelen");
		$menuItems[2] = array("idpart"=>"photos", "valuepart"=>"Foto's");
		$menuItems[3] = array("idpart"=>"videos", "valuepart"=>"Video's");
		
		$menuItems[4] = array("idpart"=>"clubs", "valuepart"=>"Clubs");
		$menuItems[5] = array("idpart"=>"persons", "valuepart"=>"Personen");
		$menuItems[6] = array("idpart"=>"halloffamers", "valuepart"=>"Eregalerij");
		
		$menuItems[7] = array("idpart"=>"competitions", "valuepart"=>"Competities");

		$menuItems[8] = array("idpart"=>"contact", "valuepart"=>"Contact");		

		$html	= "<div>Versie: " . $this->_version . "</div>\n";
		$html	.= "<ul class='art-vmenu'>\n";

		for ($x = 0; $x < count($menuItems); $x++){
			$class = "";
			if  ($menuItems[$x]['idpart'] == $activeMenu){
				$class = "class='active'";
			}

			$html	.= "<li><a href='index.php?nmclass=" . $menuItems[$x]['idpart'] . "' " . $class .  " >" . $menuItems[$x]['valuepart'] . "</a></li>\n";
		}
		$html	.= "</ul>\n";
		
		return $html;
	}

	// function getMainAdminMenu($nmschema){
	// 	/* create a main menu for the administrator part of the application, based on the content of the information_schema defined tables */

	// 	/* retrieves a list of tables in the schema name provided. */
	// 	$ftquery = "SELECT table_name ";
	// 	$ftquery .= "FROM information_schema.tables ";
	// 	$ftquery .= "WHERE table_schema = ? ";
	// 	$ftquery .= "ORDER BY table_name";

	// 	$ftrows = $this->_db->select($ftquery, "s", [$nmschema]);

	// 	/* create the HTML */
	// 	$html = "";
	// 	$i = 0;
	// 	$ftmenuitems = array();
	// 	foreach ($ftrows as $ftrow){
	// 		$ftmenuitems[$i] = "<a href='generic.php?nmschema=$nmschema&nmtable="  . $ftrow['table_name'] . "'>" . $ftrow['table_name'] . "</a>";
	// 		$i++;
	// 	}
	// 	$gridObj = new HtmlGrid();
	// 	$html = $gridObj->createGrid($ftmenuitems, 8);
	// 	return $html;
	// }

}
?>