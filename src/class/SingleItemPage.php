<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "MainPage.php";
require_once "HtmlField.php";

class SingleItemPage extends MainPage{
	var $debug	= false;
	var $nmtitle;
	var $nmtable;
	var $ftrecord;
//	var $row;
	var $id;
	var $nmkey;
	var $ftrepresentation; /* the fields that make up the representation in a list. */

	/* applies to all records */
	var $updated_at;
	var $updated_by;
	var $created_at;
	var $is_featured;

	/* constructor */
	function __construct(){
		parent::__construct();
	}

	function withID(int $id) : void
	{
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$query = "SELECT * FROM $this->nmtable WHERE $this->nmkey = " . $id;
		$this->ftrecord	= $this->queryDb($query);
		$this->setRecord($this->ftrecord[0]);
		$this->processRecord();
	}

	function processRecord(){}

	function setRecord($ftrecord){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->ftrecord = $ftrecord;
	}

	function getRecord($nmtable, $key, $id){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get a single record */
		$query = "SELECT * FROM $nmtable WHERE $key  = $id";
		$ftrecord = $this->queryDB($query);
		return $ftrecord[0];
	}

	function setId($id){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->id = $id;
	}

	function getUrl(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$nmclass = strtolower(get_class($this));
		/* create a url using the name of the class and the id */
		if (empty($this->id)){
			return "index.php?nmclass=" . $nmclass;
		} else {
			return "index.php?id=" . $this->id . "&nmclass=" . $nmclass;
		}
	}

	function getSubmenu(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* deprecated use the getSubmenu in the form table */
		$ftsubentities = MySql::getSubentities($this->nmkey);
		$fthtml = "<table><!-- SingleItemPage -->\n<tr>\n";
		foreach ($ftsubentities as $subentity){
			$nmmenu = $this->ftsubmenus[$subentity['table_name']];
			if (!empty($nmmenu)){
//				$fthtml .= "<td><a href='index.php?nmclass=" . $subentity['table_name'] . "&nmparent=$this->nmtable&$this->nmkey=$this->id'>$nmmenu</a></td>";
				$fthtml .= "<td><a href='index.php?nmclass=" . $subentity['table_name'] . "&nmparent=" . strtolower (get_class($this)) . "&nrfk=$this->id'>$nmmenu</a></td>";
			}
		}
		$fthtml .= "</tr></table>";
		return $fthtml;
	}

	function getMainAdmin(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* show a single record */
		$form = new Form($this->nmtitle, $this->nmtable, strtolower(get_class($this)), $this->id, $this->ftsubmenus);
		echo $form->displayForm("S", "V", "E");
	}

	/******************
	* getters and setters
	*/
	function getId(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->id;
	}

	function getTableName(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmtable;
	}

	function getKeyName(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmkey;
	}

	function setParent($nmparent){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->nmparent = $nmparent;
	}

	function getParent(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmparent;
	}

	function setForeignKey($nrfk){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->nrfk = $nrfk;
	}

	function getTitle(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmtitle;
	}

	function getGenericLabels($ftlabels){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$ftlabels["updated_at"]		= "";
		$ftlabels["updated_by"]		= "";
		$ftlabels["created_at"]		= "";
		$ftlabels["is_featured"]		= "Op voorpagina";

		return $ftlabels;
	}

	function getRepresentation(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->ftrepresentation;
	}

	/******************
	Editable fields
	*******************/
	function getEditFeatured($ftvalue = null){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return HtmlField::createField("is_featured", "checkbox", $ftvalue);
	}

	function getEditUpdatedBy($ftvalue = null){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return HtmlField::createField("updated_by", "hidden", $ftvalue);
	}

	function getEditUpatedAt($ftvalue = null){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return HtmlField::createField("updated_at", "hidden", $ftvalue);
	}

	function getEditCreatedAt($ftvalue = null){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return HtmlField::createField("created_at", "hidden", $ftvalue);
	}
}
?>