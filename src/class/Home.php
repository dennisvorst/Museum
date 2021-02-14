<?php
require_once "ListPage.php";
require_once "Articles.php";
require_once "Photos.php";
require_once "Persons.php";
require_once "Clubs.php";
require_once "Videos.php";
//require_once "MysqlDatabase.php";
//require_once "Log.php";

class Home extends ListPage{
	/* constructor */
	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

	function getMain($nmTab, $nrCurrentPage){
		$html = "<!-- getMain -->\n";
		$html .= "<div>\n";
		$html .= "<!-- Include the different classes here -->\n";
		$html .= $this->getContent($nmTab, $nrCurrentPage);
		$html .= "</div>\n";
		$html .= "<!-- end getMain -->\n";

		return $html;
	}

	function getMainAdmin(){
		?>
		<h1>Admin Page</h1>

		<a href="personsWithoutMugshots.php">Players without mugshots</a><br>
		<a href="selectExcelFile.php">Upload an excel file</a><br>
		<a href="replaceWeirdCharacters.php">Replace the weird characters</a><br>
		<a href="translateToXml.php">Translate to XML (run weird characters first!!)</a><br>

        <h2>Persons</h2>
		<a href="addArticlesToPersons.php">Add Articles to Persons</a><br>
		<a href="addPhotosToPersons.php">Add Photos to Persons</a><br>
		<a href="addVideosToPersons.php">Add Videos to Persons</a><br>

        <h2>Clubs</h2>
		<a href="addArticlesToClubs.php">Add Articles to Clubs</a><br>
		<a href="addVideosToClubs.php">Add Videos to Clubs</a><br>
		<?php
		echo "<p>" . phpinfo() . "</p>";
	}

	function getMenu(){}

	function getContent($nmCurrentTab, $nrCurrentPage) : string
	{
		/* create the main page content for the homepage */
		$html = "";
		$objects = array("Articles", "Photos", "Persons", "Clubs", "Videos");
		for ($x=0; $x < count($objects); $x++){
			$classObj = new $objects[$x]($this->_db, $this->_log);
			$classObj->withFeatured();
			$html .= $classObj->getPage("");
		}
		return $html;
	}

	function getMobileContent($nmCurrentTab, $nrCurrentPage){
		/* create the main page content for the homepage */
		$html = "";
		$objects = array("Articles", "Photos", "Persons", "Clubs", "Videos");
		for ($x=0; $x < count($objects); $x++){
			$classObj = new $objects[$x]($this->_db, $this->_log);
			$classObj->withFeatured();

			$html	.= "<div data-role='collapsibleset' data-content-theme='a' data-iconpos='left' id='set'>\n";
			$html	.= "  <div data-role='collapsible' id='set1' data-collapsed='true'>\n";
			$html	.= "    <h3>" . $classObj->getTitle() . "</h3>\n";
			$html	.= "    <div>\n";
			$html	.= $classObj->getPage("");
			$html	.= "    </div>\n";
			$html	.= "  </div>\n";
			$html	.= "</div>\n";
			
		}
		return $html;
	}
	
}
?>