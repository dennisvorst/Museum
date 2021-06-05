<?php
require_once "SingleItemPage.php";
//require_once "MysqlDatabase.php";

class Source extends SingleItemPage{
	protected $_nmtable	= "sources";
	protected $_nmkey		= "idsource";

	var $path	= "./images/sources/";

	var $idsource;
	var $nmsearch;
	var $nmsource;
	var $nmcontact;
	var $nmaddress;
	var $nmpostal;
	var $nmcity;
	var $ftphone;
	var $ftcell;
	var $ftemail;
	var $ftwebsite;
	var $cdpermission;


	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id				= $this->ftrecord['idsource'];

		$this->nmsearch			= $this->ftrecord['nmsearch'];
		$this->nmsource			= $this->ftrecord['nmsource'];
		$this->nmcontact		= $this->ftrecord['nmcontact'];
		$this->nmaddress		= $this->ftrecord['nmaddress'];
		$this->nmpostal			= $this->ftrecord['nmpostal'];
		$this->nmcity			= $this->ftrecord['nmcity'];
		$this->ftphone			= $this->ftrecord['ftphone'];
		$this->ftcell			= $this->ftrecord['ftcell'];
		$this->ftemail			= $this->ftrecord['ftemail'];
		$this->ftwebsite		= $this->ftrecord['ftwebsite'];
		$this->cdpermission		= $this->ftrecord['cdpermission'];
	}

	function getArticleLogo(int $id) : string
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		$query = "SELECT nmsearch FROM sources s, articles a WHERE a.idsource = s.idsource AND a.idarticle = ?";
		$row = $this->_db->select($query, "i", [$id]);
		if (empty($row))
		{
			return "";
		} else {
			$row = $row[0]['nmsearch'];
			return($this->path . strtolower($row) . ".jpg");

		}
	}

	function getSourceUrl(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* create a source url */
		$url = $this->nmsource;
		if (!empty($this->ftwebsite)){
			$url = "<a href='" . $this->ftwebsite . "' target='_new' >" . $url . "</a>";
		}
		return $url;
	}

	function getNmsource(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		return $this->nmsource;
	}

	function getAllSources(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* return a list of all the sources */
		$sql = "SELECT idsource, nmsource FROM sources ORDER BY nmsource";

		$rows = $this->_db->select($sql);
		$ftvalues = [];
		foreach ($rows as $row){
			$ftvalues[$row['idsource']] = $row['nmsource'];
		}
		return $ftvalues;
	}

	function getVerifiedSources(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}
		/* return a list of only the verified sources */
		$sql = "SELECT idsource, nmsource FROM sources WHERE cdverified = ? ORDER BY nmsource";
		$rows = $this->_db->select($sql, "s", ['Y']);
		return $rows;
	}
}
?>