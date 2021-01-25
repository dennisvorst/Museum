<?php
require_once "ListPage.php";
require_once "MenuBar.php";
require_once "HtmlTable.php";
require_once "Person.php";
require_once "MysqlDatabase.php";

class Persons extends ListPage{
	var $nmtitle			= "Personen";
	var $nmtable			= "persons";
	var $nmsingle			= "person";
	var $nmclass			= "Person";

	protected $_searchFields 		= array("nmfirst", "nmsur", "nmlast");
	protected $_orderByFields 		= array("nmlast", "nmfirst");
	var $nmAlphabetField	= "nmlast";

	var $alphabet;
	var $toolBar;

	/* for the tile list */
	var $nrcolumns = 4;

	function __construct(MysqlDatabase $db)
	{
		parent::__construct($db);

		/* get a list of letters */
		$this->alphabet	= $this->getAlphabet("persons", "nmlast");
		$this->menuBar	= new MenuBar($this->_db);
	}


	function getClubPersons($id){
		/* get the persons active or inactive within a club */

		$html = "";

		/* get the retired jerseys */
		$nminstance = new Clubretired($this->_db);
		$html .= $nminstance->getClubJerseys($id);

		return $html;
	}

	function createSelect($idperson, $id, $name){
		/* create a HTML select with persons */
		/* get the data */
		$query	= "SELECT * FROM persons ORDER BY nmfirst, nmsur, nmlast";
		$ftrows	= $this->_db->select($query);

		/* process the data */
		$object	= new Person($this->_db);
		$html = "<select id='$name' name='$name'>\n";
		$html .= "<option value='' >Selecteer een persoon</option>";


		foreach ($ftrows as $ftrow){
			$object->setRecord($ftrow);
			$object->processRecord();

			$selected = "";
			if ($idperson == $object->getRecordId()){
				$selected = "selected";
			}

			$html .= "	<option value='" . $object->getRecordId() . "' " . $selected . ">" . $object->getFullName() . "</option>\n";
		}//endforeach

		$html .= "</select>\n";
		return $html;
	}//createSelect

	function createWhereEXACT($ftfieldlist, $ftvaluelist){
		/* create the where clause for the EXACT search query, but now add the  */
		$ftwhere	= "";
		foreach($ftfieldlist as $ftfield){
			if (empty($ftwhere)){
				$ftwhere	.= "UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
			} else {
				$ftwhere	.= " OR UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
			}

		}

		$ftwhere	.= "OR UCASE(CONCAT(nmfirst, ' ', \n";
		$ftwhere	.= "  CASE \n";
		$ftwhere	.= "    WHEN nmsur IS NULL THEN ''\n";
		$ftwhere	.= "    WHEN nmsur IS NOT NULL THEN CONCAT(nmsur, ' ')\n";
		$ftwhere	.= "  END \n";
		$ftwhere	.= "  , nmlast)) LIKE '%" . $ftvaluelist[0] . "%'\n";

		return $ftwhere;
	}//createWhereExact

}
?>