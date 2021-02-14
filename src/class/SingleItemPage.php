<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "MainPage.php";
require_once "HtmlField.php";

/** todo: pass mainpage as an object in the constructor
 * todo: change the output of getRecordId back to integer
*/
class SingleItemPage extends MainPage{
	protected $_db;
	protected $_log;
	protected $_id;


	protected $_nmtitle;
	protected $_nmtable;
	var $ftrecord;
//	var $row;
	protected $_nmkey;
	var $ftrepresentation; /* the fields that make up the representation in a list. */

	/* applies to all records */
	var $updated_at;
	var $updated_by;
	var $created_at;
	var $is_featured;

	/* constructor */
	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct();

		$this->_db = $db;
		$this->_log = $log;

	}

	function withID(int $id) : void
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$query = "SELECT * FROM $this->_nmtable WHERE $this->_nmkey = ?";
		$this->ftrecord	= $this->_db->select($query, "i", [$id]);
		$this->setRecord($this->ftrecord[0]);
		$this->processRecord();
	}

	function processRecord(){}

	function setRecord($ftrecord){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$this->ftrecord = $ftrecord;
	}

	function getRecord($nmtable, $key, $id){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
			$this->_log->write("nmtable = " . $nmtable);
			$this->_log->write("key     = " . $key);
			$this->_log->write("id      = " . $id);
		}

		/* get a single record */
		$query = "SELECT * FROM $nmtable WHERE $key  = ?";
		$ftrecord = $this->_db->select($query, "i", [$id]);
		if (empty($ftrecord)) 
		{
			return [];
		} else {
			return $ftrecord[0];
		}
	}

	function setId($id){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$this->_id = $id;
	}

	function getUrl(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$nmclass = strtolower(get_class($this));
		/* create a url using the name of the class and the id */
		if (empty($this->_id)){
			return "index.php?nmclass=" . $nmclass;
		} else {
			return "index.php?id=" . $this->_id . "&nmclass=" . $nmclass;
		}
	}

	function getSubmenu(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		/* deprecated use the getSubmenu in the form table */
		$ftsubentities = MySql::getSubentities($this->_nmkey);
		$fthtml = "<table><!-- SingleItemPage -->\n<tr>\n";
		foreach ($ftsubentities as $subentity){
			$nmmenu = $this->ftsubmenus[$subentity['table_name']];
			if (!empty($nmmenu)){
				$fthtml .= "<td><a href='index.php?nmclass=" . $subentity['table_name'] . "&nmparent=" . strtolower (get_class($this)) . "&nrfk=$this->_id'>$nmmenu</a></td>";
			}
		}
		$fthtml .= "</tr></table>";
		return $fthtml;
	}

	function getMainAdmin(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		/* show a single record */
		$form = new Form($this->_nmtitle, $this->_nmtable, strtolower(get_class($this)), $this->_id, $this->ftsubmenus);
		echo $form->displayForm("S", "V", "E");
	}

	/******************
	* getters and setters
	*/
	function getRecordId()
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}
		return $this->_id;
	}

	function getTableName(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return $this->_nmtable;
	}

	function getKeyName(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return $this->_nmkey;
	}

	function setParent($nmparent){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$this->nmparent = $nmparent;
	}

	function getParent(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return $this->nmparent;
	}

	function setForeignKey($nrfk){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$this->nrfk = $nrfk;
	}

	function getTitle(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return $this->nmtitle;
	}

	function getGenericLabels($ftlabels){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		$ftlabels["updated_at"]		= "";
		$ftlabels["updated_by"]		= "";
		$ftlabels["created_at"]		= "";
		$ftlabels["is_featured"]		= "Op voorpagina";

		return $ftlabels;
	}

	function getRepresentation(){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return $this->ftrepresentation;
	}

	/******************
	Editable fields
	*******************/
	function getEditFeatured($ftvalue = null){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return HtmlField::createField("is_featured", "checkbox", $ftvalue);
	}

	function getEditUpdatedBy($ftvalue = null){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return HtmlField::createField("updated_by", "hidden", $ftvalue);
	}

	function getEditUpatedAt($ftvalue = null){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return HtmlField::createField("updated_at", "hidden", $ftvalue);
	}

	function getEditCreatedAt($ftvalue = null){
		if ($this->_debug){
			$this->_log->write(__METHOD__);
		}

		return HtmlField::createField("created_at", "hidden", $ftvalue);
	}
}
?>