<?php
require_once "SingleItemPage.php";

class Source extends SingleItemPage{
	var $nmtable	= "sources";
	var $nmkey		= "idsource";

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


	function __construct() {
		parent::__construct();
	}

	function processRecord(){
		$this->id				= $this->ftrecord['idsource'];

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

	function getArticleLogo($id){
		$query = "SELECT nmsearch FROM sources s, articles a WHERE a.idsource = s.idsource AND a.idarticle = $id";
		$row = $this->queryDb($query);
		$row = $row[0]['nmsearch'];

		return($this->path . strtolower($row) . ".jpg");
	}

	function getSourceUrl(){
		/* create a source url */
		$url = $this->nmsource;
		if (!empty($this->ftwebsite)){
			$url = "<a href='" . $this->ftwebsite . "' target='_new' >" . $url . "</a>";
		}
		return $url;
	}

	function getNmsource(){
		return $this->nmsource;
	}

	function getAllSources(){
		/* return a list of all the sources */
		$ftquery = "SELECT idsource, nmsource FROM sources ORDER BY nmsource";

		$ftrows = $this->queryDb($ftquery);
		$ftvalues = array();
		foreach ($ftrows as $ftrow){
			$ftvalues[$ftrow['idsource']] = $ftrow['nmsource'];
		}
		return $ftvalues;
	}

	function getVerifiedSources(){
		/* return a list of only the verified sources */
		$ftquery = "SELECT idsource, nmsource FROM sources WHERE cdverified = 'Y' ORDER BY nmsource";
		$ftrows = $this->queryDb($ftquery);
		return $ftrows;
	}
}
?>