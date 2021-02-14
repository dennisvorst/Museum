<?php
require_once "SingleItemPage.php";
require_once "HtmlSelect.php";
require_once "Tab.php";
require_once "Date.php";
//require_once "MysqlDatabase.php";

class Person extends SingleItemPage{
	protected $_nmtitle	= "Personen";
	protected $_nmtable	= "persons";
	protected $_nmkey		= "idperson";

	protected $_nmfirst;
	protected $_nmfull;
	protected $_nmsur;
	protected $_nmlast;
	protected $_nmnick;
	protected $_cdgender;
	protected $_dtbirth;
	protected $_nmbirthplace;
	protected $_cdcountry;
	protected $_dtdeath;
	protected $_nmdeathplace;
	protected $_nmaddress;
	protected $_nmpostal;
	protected $_nmcity;
	protected $_ftphone;
	protected $_ftcell;
	protected $_ftemail;
	protected $_cdthrows;
	protected $_cdbats;
	protected $_cdsubscr;
	protected $_dtsend;
	protected $_nmclubstart;
	protected $_dthof;
	protected $_idphotohof;
	protected $_ftbiography;

	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct($db, $log);
	}

	function processRecord(){
		if (empty($this->ftrecord)) 
		{
			return;
		}
		$this->_id			= $this->ftrecord['idperson'];

		$this->_nmfirst 		= $this->ftrecord['nmfirst'];
		$this->_nmfull 		= $this->ftrecord['nmfull'];
		$this->_nmsur		= $this->ftrecord['nmsur'];
		$this->_nmlast 		= $this->ftrecord['nmlast'];
		$this->_nmnick 		= $this->ftrecord['nmnick'];
		$this->_cdgender		= $this->ftrecord['cdgender'];
		$this->_dtbirth 		= $this->ftrecord['dtbirth'];
		$this->_nmbirthplace = $this->ftrecord['nmbirthplace'];
		$this->_cdcountry 	= $this->ftrecord['cdcountry'];
		$this->_dtdeath 		= $this->ftrecord['dtdeath'];
		$this->_nmdeathplace = $this->ftrecord['nmdeathplace'];
		$this->_nmaddress 	= $this->ftrecord['nmaddress'];
		$this->_nmpostal 	= $this->ftrecord['nmpostal'];
		$this->_nmcity 		= $this->ftrecord['nmcity'];
		$this->_ftphone 		= $this->ftrecord['ftphone'];
		$this->_ftcell 		= $this->ftrecord['ftcell'];
		$this->_ftemail 		= $this->ftrecord['ftemail'];
		$this->_cdthrows 	= $this->ftrecord['cdthrows'];
		$this->_cdbats 		= $this->ftrecord['cdbats'];
		$this->_cdsubscr 	= $this->ftrecord['cdsubscr'];
		$this->_dtsend 		= $this->ftrecord['dtsend'];
		$this->_nmclubstart 	= $this->ftrecord['nmclubstart'];
		$this->_dthof 		= $this->ftrecord['dthof'];
		$this->_idphotohof 	= $this->ftrecord['idphotohof'];
		$this->_ftbiography 	= $this->ftrecord['ftbiography'];
		$this->_is_featured 	= $this->ftrecord['is_featured'];
	}

	protected $_photoCollection;
	function getPhotoCollection(int $id) : array
	{

		return $this->_photoCollection;
	}


	function getContent($nmCurrentTab, $nrCurrentPage) : string
	{
		/*******************
		 gather the data
		 *******************/
		/* get the person */
		$html = "";
		$this->ftrecord	= $this->getRecord($this->_nmtable, $this->_nmkey, $this->_id);
		if (!empty($this->ftrecord))
		{
			$this->processRecord();

			/*******************
			 create the content
			 *******************/
			$html = "<table>\n";
			$html .= "<tr>" . Social::addShareButtons($this->getUrl()) . "</tr>\n";
			$html .= "</table>\n";
			$html .= "<h1>{$this->getFullName()}</h1>\n";
			
			$html .= "<p>{$this->_isHof($this->getHofDate())}</p>";

			/** todo add a photo  */
			/** todo add a gold star if he is in the hall of fame */

			/*******************
			 search and display the additional information
			 *******************/
			/* create the tabs */

			/** todo : create a person controller that gets all the objects mentioned below and passes them on in the constructor */
			/** todo: add the jerseys to the list */
			$list = ["articles", "photos", "videos", "Statistics", "teams"];
			$tabObj	= new HtmlTabPage($this->_db, $this->_log, $this->_id);
			$html .= $tabObj->getTab("Person", $list, $nmCurrentTab, $nrCurrentPage, $this->_id, $this->_db);
		}
		return $html;
	}// getContent

	function getMenu(){
		/* needs to be overriden */
		$html = "";
		return $html;

		$html .= "<div>\n";
		$html .= "<div>\n";
		$html .= "<h3>Personen</h3>\n";
		$html .= "</div>\n";
		$html .= "<div>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";
		$html .= "<div>\n";
		$html .= "<div>\n";
		$html .= "<h3>Clubs</h3>\n";
		$html .= "</div>\n";
		$html .= "<div>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";
		$html .= "<div>\n";
		$html .= "<div>\n";
		$html .= "<h3>Competities</h3>\n";
		$html .= "</div>\n";
		$html .= "<div>\n";
		$html .= "</div>\n";
		$html .= "</div>\n";

		return $html;

	}//getMenu

	function createThumbnail(){
		/* get the thumbnail of the person */
		$photoObj	= new Photo($this->_db, $this->_log);
		$mugshot	= $photoObj->getMugshot($this->_id);
		$width		= $photoObj->getThumbnailWidth();
		$height		= $photoObj->getThumbnailHeight();

		/* create the HTML */
		$html = "<div class='col-xs-3'>\n";
		$html .= "  <div align='center'>\n";
		$html .= "    <figure>\n";

		if (!empty($mugshot)){
			$html .= "    <a href='". $this->getUrl() . "'>" . $mugshot . "</a>\n";
		}

		$html .= "      <figcaption>\n";
		$html .= $this->getNameWithUrl() . "\n";
		$html .= "      </figcaption>\n";
		$html .= "    </figure>\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";
		return $html;
	}//createThumbnail

	function getFullName(){
		/* get the fullname of the player */
		return $this->_nmfirst . " " . $this->getLastName();
	}

	function getLastName(){
		if (empty($this->_nmsur)){
			return $this->_nmlast;
		} else {
			return $this->_nmsur. " " . $this->_nmlast;
		}
	}

	function getPersonName($nmfirst, $nmsur, $nmlast, $hasdied){
		/* get the fullname of the player */
		return $nmfirst . (empty($nmsur) ? " " : " " . $nmsur . " " ) . $nmlast . ($hasdied ? " (&#8224;)" : "");
	}

	function getNickName(){
		if (!empty($this->_nmnick)){
			if (empty($this->_nmsur)){
				return $this->_nmnick . " "	. $this->_nmlast;
			} else {
				return $this->_nmnick . " "	. $this->_nmsur. " " . $this->_nmlast;
			}
		} else {
			return "";
		}
	}

	function getNameWithUrl(){
		return "<a href='". $this->getUrl() . "'>" . $this->getFullName() . "</a>";
	}

	private function isInHallOfFame() : bool
	{
		if ($this->_dthof) 
		{
			return true;
		} else {
			return false;
		}
	}

	private function _isHof(string $dthof) : string
	{
		if ($this->isInHallOffame()) 
		{
			$date = new Date();
			$dthof = $date->translateDate($dthof, "D");
			return "<i class='fas fa-star'></i> in de eregalerij sinds {$dthof}";
		}
		return "";
	}

	/** getters and setter */
	function setHofDate(string $date) : void
	{
		$this->_dthof = "";

		if (!empty($date))
		{
			$format = 'Y-m-d';
	
			$d = DateTime::createFromFormat($format, $date);
			if ($d && $d->format($format) === $date)
			{
				$this->_dthof = $date;
			}
		}
	}

	function getHofDate() : string 
	{
//		print_r("|" . $this->_dthof . "|");
		if (empty($this->_dthof)) 
		{
			return "";
		} else {
			return $this->_dthof;
		}
	}


	function getLabels (){
		$ftlabels["idperson"]		= "";
		$ftlabels["nmfirst"]		= "Roepnaam";
		$ftlabels["nmfull"]			= "Volledige naam";
		$ftlabels["nmsur"]			= "Tussenvoegsel";
		$ftlabels["nmlast"]			= "Achternaam";
		$ftlabels["nmnick"]			= "Bijnaam";
		$ftlabels["cdgender"]		= "Geslacht";
		$ftlabels["dtbirth"]		= "Geboortedatum";
		$ftlabels["nmbirthplace"]	= "Geboorteplaats";
		$ftlabels["cdcountry"]		= "Land";
		$ftlabels["dtdeath"]		= "Datum overlijden";
		$ftlabels["nmdeathplace"]	= "Plaats van overlijden";
		$ftlabels["nmaddress"]		= "Adres";
		$ftlabels["nmpostal"]		= "Postcode";
		$ftlabels["nmcity"]			= "Plaats";
		$ftlabels["ftphone"]		= "Telefoon";
		$ftlabels["ftcell"]			= "Mobiel";
		$ftlabels["ftemail"]		= "Email";
		$ftlabels["dthof"]			= "In Hall of Fame sinds";
		$ftlabels["cdthrows"]		= "Gooit";
		$ftlabels["cdbats"]			= "Slaat";
		$ftlabels["cdsubscr"]		= "Geabboneerd";
		$ftlabels["dtsend"]			= "Datum verzonden";
		$ftlabels["nmclubstart"]	= "Eerste club";
		$ftlabels["ftbiography"]	= "Biografie";

		$ftlabels = parent::getGenericLabels($ftlabels);

		return $ftlabels;
	}

	/******************
	Editable fields
	*******************/
	function getEditCdbats($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getDexterity("cdbats", $ftvalue);
	}
	function getEditCdthrows($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getDexterity("cdthrows", $ftvalue);
	}
	function getEditIdsex($ftvalue = null){
		$htmlObject = new HtmlSelect();
		return $htmlObject->getSex("cdgender", $ftvalue);
	}


}
?>