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
	protected $_nmtable	= "clubs";
	protected $_nmkey		= "idclub";

	protected $_idclub;
	protected $_cdstatus;
	protected $_nmsearch;
	protected $_nmclub;
	protected $_nmfull;
	protected $_ftlocation;
	protected $_ftfield;
	protected $_ftaddress;
	protected $_ftpostalcode;
	protected $_nmcity;
	protected $_ftphone;

	protected $_nmprimarycolor;
	protected $_nmsecondarycolor;
	protected $_nmtertiarycolor;

	protected $_cdcountry;

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
		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id				= $this->ftrecord['idclub'];

		$this->_cdstatus		= $this->ftrecord['cdstatus'];
		$this->_nmsearch		= $this->ftrecord['nmsearch'];
		$this->_nmclub			= $this->ftrecord['nmclub'];
		$this->_nmfull			= $this->ftrecord['nmfull'];
		$this->_ftlocation		= $this->ftrecord['ftlocation'];
		$this->_ftfield			= $this->ftrecord['ftfield'];
		$this->_ftaddress		= $this->ftrecord['ftaddress'];
		$this->_ftpostalcode	= $this->ftrecord['ftpostalcode'];
		$this->_nmcity			= $this->ftrecord['nmcity'];
		$this->_ftphone			= $this->ftrecord['ftphone'];

		$this->_nmprimarycolor	= $this->ftrecord['nmprimarycolor'];
		$this->_nmsecondarycolor= $this->ftrecord['nmsecondarycolor'];
		$this->_nmtertiarycolor	= $this->ftrecord['nmtertiarycolor'];

		$this->_is_featured		= $this->ftrecord['is_featured'];
		$this->_cdcountry		= $this->ftrecord['cdcountry'];
	}

	function createThumbnail($nrsize = 3) : string {
		/* create the thumbnail image */
		$html = "<div class='col-xs-" . $nrsize . "'>\n";
		$html .= "  <div>\n";
		$html .= "    <a href='" . $this->getUrl() . "' >$this->_nmfull</a>\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->_ftlocation . "\n";
		$html .= "  </div>\n";
		$html .= "  <div>\n";
		$html .= "    " . $this->_ftfield . "\n";
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
			$sql = "SELECT * FROM " . $this->_nmtable . " WHERE idclub = ? ORDER BY nrjersey";
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
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{		
			$this->processRecord();

			/*******************
			 create the content
			 *******************/
			$html = "<h1>" . $this->_nmfull . "</h1>\n";

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
		}
		return $html;
	}// getContent

	function getNameWithUrl() : string
	{
		return "<a href='". $this->getUrl() . "'>" . $this->_nmfull . "</a>";
	}

	/* getters and setters */
	function getFullName() : string
	{
		return $this->_nmclub;
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
		return $this->_nmprimarycolor;
	}
	function getSecondaryColor() : string
	{
		return $this->_nmsecondarycolor;
	}
	function getTertiaryColor() : string
	{
		return $this->_nmtertiarycolor;
	}
}
?>