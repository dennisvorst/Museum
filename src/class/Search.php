<?php
/** 
 * done : search mag niet leeg zijn  
 * todo: set de resultaten in tabs
 * todo : spoor alle artikelen op met lege bodies en fix ze
 * todo : update de diakrieten in de database 
 * 
*/
require_once "Delpher.php";
//require_once "MysqlDatabase.php";

class Search{
	private $search;
	private $_db;
	private $_log;


	/* constructor */
	function __construct(MysqlDatabase $db, Log $log)
	{
		$this->_db = $db;
		$this->_log = $log;
	}


	function getMain(string $search = null) : string 
	{
		$html = "";
		if (empty($search))
		{
			$html .= "<h2>Zoeken</h2>\n";
			$html .= "<p>U heeft een lege zoekwaarde opgegeven, dat is helaas niet toegestaan.";

		} else {
			$html .= "<h2>Zoekresultaten voor '" . $search . "'</h2>\n";

			/* add a Delpher button */
			// if (class_exists("Delpher"))
			// {
			// 	$html .= "<div class='btn-group' role='group'>\n";
			// 	$html .= Delpher::createButton($search);
			// 	$html .= "  </div>\n";
			// }
		}
		return $html;
	}

	function setQuery(string $search) : void
	{
		echo $this->getMain($search);

		$this->search	 = $this->getSearchArray($search);
	}

	function getSearchArray($search){
		/* create an array out of the search string */
		/* if there is no " in the string use the entire string */
		if (strpos($search, "\"" ) >= 0){
			$search = str_getcsv($search,' ','"');
		} else {
			$search = [$search];
		}

		/* find the articles */
		$tables = ['articles'=>'Articles', 'photos'=>'Photos', 'persons'=>'Persons', 'videos'=>'Videos', 'clubs'=>'Clubs'];
		$keys	= array_keys($tables);

		foreach ($keys as $key){
			$nmtable 	= $key;
			$nmclass	= $tables[$key];

			$nminstance = new $nmclass($this->_db, $this->_log);
			$where  = $this->createWhere($nmtable, $nminstance->getSearchFields(), $search, "");

			$sql = "SELECT * FROM {$nmtable} WHERE {$where}";
			$rows = $this->_db->select($sql);
			$nminstance->setRows($rows);
			echo $nminstance->getPage("");
			$nminstance = null;
		}

		return $search;
	}

	
	/**************************************************
	functions specific to creating the sql query string
	***************************************************/
	function createWhere($nmtable, $ftfieldlist, $ftvaluelist, $nmoperator){
		/* init */
		$query = "SELECT column_name, data_type, is_nullable, character_maximum_length FROM information_schema.columns WHERE table_name = '$nmtable'";
		$properties	= $this->_db->select($query);
		if (empty($nmoperator)){
			$nmoperator = "AND";
		}

		if (!is_array($ftfieldlist)){$ftfieldlist = [$ftfieldlist];}
		if (!is_array($ftvaluelist)){$ftvaluelist = [$ftvaluelist];}

		/* create the where clause */
		$where = "";

		/* process each field */
		foreach ($ftvaluelist as $ftvalue){
			$tempWhere = "";
			foreach ($ftfieldlist as $field){
				/* get the properties */
				foreach($properties as $property){

					if ($property['column_name'] == $field){
						$nmdatatype = $property['data_type'];
					}
				}

				/* process the value */
				if (is_numeric($ftvalue)){
					$tmpvalue = $ftvalue;
				} else {
					$tmpvalue = "'%". strtoupper($ftvalue) . "%'";
				}

				/* create part of the where string */
				switch ($nmdatatype){
					case "int":
					case "tinyint":
					case "year":
						$ftpart = "$field = $tmpvalue";
						break;

					case "date":
						$ftpart = "$field = $tmpvalue";
						break;

					case "text":
					case "longtext":
					case "varchar":
						$ftpart = "UCASE($field) LIKE $tmpvalue";
						break;
					default:
						print_r($nmdatatype . "<br>");
				}

				/* create the string */
				if (empty($tempWhere)){
					$tempWhere = $ftpart;
				} else {
					$tempWhere .= " OR $ftpart";
				}
			}
			if (empty($where)){
				$where = " (" . $tempWhere . ")";
			} else {
				$where .= " $nmoperator (" . $tempWhere . ")";
			}
		}
		return $where;
	}	
}
?>