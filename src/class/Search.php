<?php
require_once "Delpher.php";

class Search{
	private $ftsearch;

	/* constructor */
	function __construct(){
	}

	function getMain(string $search = null) : string 
	{
		$html = "<h2 class='art-postheader'>";
		if (empty($search))
		{
			$html .= "Zoeken";
		} else {
			$html .= "Zoekresultaten voor '" . $search . "'";
		}
		$html .= "</h2>\n";

		$html .= "<form action='search.php' method='post' accept-charset='utf-8'>\n";
		$html .= "  <div class='active-orange-4 mb-4'>\n";
		$html .= "    <input name='ftquery' class='form-control' type='text' placeholder='Zoeken' " . (empty($search) ?: "value='" . $search . "' " )  . "aria-label='Search' required>\n";
		$html .= "  </div>\n";

		$html .= "  <div class='btn-group' role='group'>\n";
		$html .= "    <input class='btn btn-outline-secondary' type='submit' value='Zoeken'>\n";
		$html .= "    <input class='btn btn-outline-secondary' type='reset' value='Maak leeg'>\n";
		$html .= "  </div>\n";
		$html .= "</form>\n";
		$html .= "<br />\n";

		/* add a Delpher button */
		if (class_exists("Delpher") && !empty($search))
		{
			$html .= "<div class='btn-group' role='group'>\n";
			$html .= Delpher::createButton($search);
			$html .= "  </div>\n";
		}

		return $html;
	}

	function setFtsearch($ftsearch){
		echo $this->getMain($ftsearch);

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
			// todo : tuirn into correct select
			$ftrows = $nminstance->queryDb_6(null, $nmtable, null, null, 0, 30);
			$nminstance->setRows($ftrows);
			echo $nminstance->getPage("");
			$nminstance = null;
		}

		return $ftsearch;
	}
}
?>