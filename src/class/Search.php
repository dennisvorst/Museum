<?php
class Search{
	private $ftsearch;

	/* constructor */
	function __construct(){
	}

	function getMain(){
		$html = "<form action='search.php' method='post' accept-charset='utf-8'>\n";
		$html .= "  <div class='active-orange-4 mb-4'>\n";
		$html .= "    <input class='form-control' type='text' placeholder='Zoeken' aria-label='Search'>\n";
		$html .= "  </div>\n";
		$html .= "  <p>\n";
		$html .= "    <input type='submit' value='Zoeken'>\n";
		$html .= "    <input type='reset' value='Maak leeg'>\n";
		$html .= "  </p>\n";
		$html .= "</form>\n";

		return $html;
	}

	function setFtsearch($ftsearch){
		echo $this->getMain();

		$this->ftsearch	 = $this->getSearchArray($ftsearch);
	}

	function getSearchArray($ftsearch){
		/* create an array out of the search string */
		/* if there is no " in the string use the entire string */
		if (strpos($ftsearch, "\"" ) >= 0){
			$ftsearch = str_getcsv($ftsearch,' ','"');
		} else {
			$ftsearch = array($ftsearch);
		}

		/* find the articles */
		$tables = array('articles'=>'Articles', 'photos'=>'Photos', 'persons'=>'Persons', 'videos'=>'Videos', 'clubs'=>'Clubs');
		$keys	= array_keys($tables);

		foreach ($keys as $key){
			$nmtable 	= $key;
			$nmclass	= $tables[$key];

			$nminstance = new $nmclass();
			$nminstance->createWhere($nmtable, $nminstance->getSearchFields(), $ftsearch, "");
			$ftrows = $nminstance->queryDb_6(null, $nmtable, null, null, 0, 30);
			$nminstance->setRows($ftrows);
			echo $nminstance->getPage("");
			$nminstance = null;
		}

		return $ftsearch;
	}
}
?>