<?php
/**
 * todo : add retired jerseys
 * todo : add stats
 *
 */

require_once "SingleItemPage.php";
require_once "HtmlSelect.php";
require_once "HtmlTabPage.php";
//require_once "MysqlDatabase.php";

class Club extends SingleItemPage{
	var $nmtable	= "clubs";
	var $nmkey		= "idclub";

	var $idclub;
	var $cdstatus;
	var $nmsearch;
	var $nmclub;
	var $nmfull;
	var $ftlocation;
	var $ftfield;
	var $ftaddress;
	var $ftpostalcode;
	var $nmcity;
	var $ftphone;

	var $nmprimarycolor;
	var $nmsecondarycolor;
	var $nmtertiarycolor;

	var $ftsubmenus = array("clubretired"=>"Retired Numbers", "teams"=>"Teams");

	function __construct(MysqlDatabase $db, Log $log, int $id = null){
		parent::__construct($db, $log);

		if (!empty($id))
		{
			$this->withID($id);
			$this->_articleCollection = $this->_getArticleCollection();
			$this->_photoCollection = $this->_getPhotoCollection();
			$this->_teamCollection = $this->_getTeamCollection();
			$this->_videoCollection = $this->_getVideoCollection();
		}
	}

	function processRecord() : void
	{
		$this->_id				= $this->ftrecord['idclub'];

		$this->cdstatus			= $this->ftrecord['cdstatus'];
		$this->nmsearch			= $this->ftrecord['nmsearch'];
		$this->nmclub			= $this->ftrecord['nmclub'];
		$this->nmfull			= $this->ftrecord['nmfull'];
		$this->ftlocation		= $this->ftrecord['ftlocation'];
		$this->ftfield			= $this->ftrecord['ftfield'];
		$this->ftaddress		= $this->ftrecord['ftaddress'];
		$this->ftpostalcode		= $this->ftrecord['ftpostalcode'];
		$this->nmcity			= $this->ftrecord['nmcity'];
		$this->ftphone			= $this->ftrecord['ftphone'];

		$this->nmprimarycolor	= $this->ftrecord['nmprimarycolor'];
		$this->nmsecondarycolor	= $this->ftrecord['nmsecondarycolor'];
		$this->nmtertiarycolor	= $this->ftrecord['nmtertiarycolor'];

		$this->is_featured			= $this->ftrecord['is_featured'];
	}

	function createThumbnail($nrsize = 3) : string {
		/* create the thumbnail image */
		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "  <div>\n";
		$html .= "    <a href='" . $this->getUrl() . "' >$this->nmfull</a>\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->ftlocation . "\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->ftfield . "\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";

		return $html;
	}

	var $_retiredNumberCollection = [];
	private function _getRetiredNumberCollection(int $id,  $db) : array
	{
		if (empty($this->_retiredNumberCollection))
		{
			/* get the retired jerseys of a club */
			$sql = "SELECT * FROM " . $this->nmtable . " WHERE idclub = ? ORDER BY nrjersey";
			$this->_retiredNumberCollection = $db->select($sql, "i", [$id]);
		}
		return $this->_retiredNumberCollection;
	}



	var $_articleCollection = [];
	private function _getArticleCollection(int $id) : array
	{
		if (empty($this->_articleCollection))
		{

		}
		return $this->_articleCollection;
	}

	var $_teamCollection = [];
	private function _getTeamCollection(int $id) : array
	{
		if (empty($this->_teamCollection))
		{

		}
		return $this->_teamCollection;
	}

	var $_photoCollection = [];
	private function _getPhotoCollection(int $id) : array
	{
		if (empty($this->_photoCollection))
		{

		}
		return $this->_photoCollection;
	}

	var $_videoCollection = [];
	private function _getVideoCollection(int $id) : array
	{
		if (empty($this->_videoCollection))
		{

		}
		return $this->_videoCollection;
	}


	function getContent($nmCurrentTab, $nrCurrentPage) : string
	{
		/**
		 * $nrCurrentPage = the current displayed tab page
		*/
		/*******************
		 gather the data
		 *******************/

		/* get the club */
		$this->ftrecord	= $this->getRecord($this->nmtable, $this->nmkey, $this->_id);
		$this->processRecord();

		/*******************
		 create the content
		 *******************/
		$html = "<h1>" . $this->nmfull . "</h1>\n";

		/*******************
		 search and display the additional information
		 *******************/

		/* create the tabs */

		/* here is where i need to know to additional things.
		1. Which is the active tab?
		2. What is its current page number
		*/
		$list = ["articles", "videos", "photos", "persons", "teams"];
		$tabObj	= new HtmlTabPage($this->_db, $this->_log, $this->_id);
		$html .= $tabObj->getTab("Club", $list, $nmCurrentTab, $nrCurrentPage, $this->_id, $this->_db);

		return $html;
	}// getContent

	function getNameWithUrl() : string
	{
		return "<a href='". $this->getUrl() . "'>" . $this->nmfull . "</a>";
	}

	/* getters and setters */
//	function getClubName(){
//		/* deprecated */
//		return $this->nmclub;
//	}
	function getFullName() : string
	{
		return $this->nmclub;
	}

	function getLabels () : array {
		$ftlabels["idclub"]			= "";
		$ftlabels["cdstatus"]		= "Status";
		$ftlabels["nmsearch"]		= "Zoeknaam";
		$ftlabels["nmclub"]			= "Clubnaam";
		$ftlabels["nmfull"]			= "Volledige naam";
		$ftlabels["ftlocation"]		= "Locatie";
		$ftlabels["ftfield"]		= "Naam sportpark";
		$ftlabels["ftaddress"]		= "Adres";
		$ftlabels["ftpostalcode"]	= "Postcode";
		$ftlabels["nmcity"]			= "Plaats";
		$ftlabels["ftphone"]		= "Telefoon";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/

	/******************
	Lists
	*******************/
	function getClubs() : array {
		/* return a list of only the verified sources */
		$sql = "SELECT idclub, nmclub FROM clubs ORDER BY nmclub";
		$rows = $this->_db->select($sql);

		$ftvalues = array();
		foreach ($rows as $row){
			$ftvalues[$row['idclub']] = $row['nmclub'];
		}
		return $ftvalues;
	}

	/******************
	Getters and setters
	*******************/
	function getPrimaryColor() : string
	{
		return $this->nmprimarycolor;
	}
	function getSecondaryColor() : string
	{
		return $this->nmsecondarycolor;
	}
	function getTertiaryColor() : string
	{
		return $this->nmtertiarycolor;
	}
}
?>