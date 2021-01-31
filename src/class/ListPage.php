<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "HtmlField.php";
require_once "HtmlSelect.php";
require_once "MainPage.php";
//require_once "MysqlDatabase.php";
//require_once "Log.php";

class ListPage extends MainPage{
	protected $_db;
	protected $_rows = [];

	protected $_nmtitle;
	protected $_nmtable;
	protected $_nmsingle;

	var $nmclass;

	protected $_searchFields	= array("ListPageContent");
	protected $_orderByFields;
	var $ftsubmenus		= array();

	public static $nryear;
	public static $nmalphabet = "A";

	var $nmAlphabetField;
	var $nmYearField = "nryear";
    var $nrRecordsOnPage = 32;

	var $menuBar;

	/* for the tile list */
	var $nrcolumns = 2;

	/* for the foreign key properties */
	var $ftforeignkeys	= array();

	/* constructor */
	function __construct(MysqlDatabase $db, Log $log){
		parent::__construct();

		$this->_db = $db;
	}

	/** todo - make prepare statement proof*/
	function withName($ftsearch) {
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$ftwhere	= $this->getWhere();
		$ftorderby	= $this->getOrderBy();

		$query = "SELECT * FROM $this->_nmtable ";
		if (!empty($ftwhere)){
			$query .= $ftwhere;
		}
		if (!empty($ftorderby)){
			$query .= $ftorderby;
		}
		$this->_rows	= $this->_db->select($query);
	}

	/** todo - make prepare statement proof*/
	function withFeatured() {
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$query = "SELECT * FROM $this->_nmtable WHERE is_featured = ? ";
		if (!empty($ftorderby)){
			$query .= $ftorderby;
		}
		$this->_rows	= $this->_db->select($query, "i", [1]);
	}

	function getOrderBy(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$ftorderby = "";
		if (!empty($this->_orderByFields)){
			$ftorderby = " ORDER BY " . $this->_orderByFields . " ";
		}
		return $ftorderby;
	}

	function getRecords($nmtable, $nrrowsstart, $nrrowsend){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get a list of records based on the year or the alphabet */
		$ftwhere = "";
		$sql = "SELECT * FROM {$nmtable} ";
		$types = "";
		$values = [];


		/* where */
		if (!empty($this->nmYearField) && !empty(ListPage::$nryear)){
			$ftwhere = "WHERE $this->nmYearField = ? ";
			$types .= "s";
			$values[] =  ListPage::$nryear;
		}
		if (!empty($this->nmAlphabetField) && !empty(ListPage::$nmalphabet)){
			if (empty($ftwhere)){
				$ftwhere = "WHERE ";
			} else {
				$ftwhere .= "AND ";
			}
			$ftwhere .= "{$this->nmAlphabetField} LIKE ? ";
			$types .= "s";
			$values[] = ListPage::$nmalphabet . "%";
		}
		$sql .= $ftwhere . " ";

		/* order by */
		$orderBy = "";
		if (!empty($this->_orderByFields)){
			for ($i = 0; $i < count($this->_orderByFields); $i++){
				if (empty($orderBy)){
					$orderBy = "ORDER BY ";;
				} else {
					$orderBy .= ", ";
				}
				$orderBy .= "{$this->_orderByFields[$i]} ASC ";
			}
		} else {
			$orderBy = "";
		}
		$sql .= $orderBy;

		/* limit */
		if ((!empty($nrrowsstart) or $nrrowsstart === 0)and !empty($nrrowsend)){
			$sql .= "LIMIT ?, ?";
			$types .= "ii";
			$values[] = $nrrowsstart;
			$values[] = $nrrowsend;
		}

		$this->_rows = $this->_db->select($sql, $types, $values);
	}//getRecords

	static function getStartYear(MysqlDatabase $db, string $nmtable) : void
	{
		/* get the year to start with in the menu */
		$sql = "SELECT MIN(nryear) AS nryear FROM $nmtable";
		$nmvalue = $db->select($sql);
		ListPage::$nryear = $nmvalue[0]['nryear'];
	}

	function getYears($nmtable) : array
	{
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the years from a tables */
//		$rows = $this->getData("DISTINCT(nryear) as nryear", $nmtable, "", "nryear", "");
		$sql = "SELECT DISTINCT(nryear) as nryear FROM {$nmtable} ORDER BY nryear";
		$rows = $this->_db->select($sql);

		$years = [];
		for ($x=0; $x < count($rows); $x++){
			$years[$x] = $rows[$x]['nryear'];
		}
		return $years;
	}

	function getAlphabet($nmtable, $nmfield){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* get the alphabet from a tables */
		$letters = array();

//        $rows = $this->getData("DISTINCT(UPPER(LEFT({$nmfield},1))) AS letter", $nmtable, "", $nmfield, "");
		$sql = "SELECT DISTINCT(UPPER(LEFT({$nmfield},1))) AS letter FROM {$nmtable} ORDER BY {$nmfield}";
		$rows = $this->_db->select($sql);

		for ($x=0; $x < count($rows); $x++){
			$letters[$x] = $rows[$x]['letter'];
		}
		return $letters;
	}

	function getTileList($fttiles, $nmclasstag = null){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* create a table filled with tiles */

		/* init */
		$html = "";
		$nrMaxSize	= 10;
		$nrColumns	= 3;
		$nrSize		= floor($nrMaxSize / $nrColumns);
		$i = 0;

		/* add an additional classtag if necessary and start the div */
		if (!isset($nmclasstag)){
			$html	= "<div class='container'>\n";
		} else {
			$html	= "<div class='container " . $nmclasstag . "'>\n";
		}

		$html	.= "<div class='row'>\n";

		foreach ($fttiles as $fttile){
			if($i % $nrColumns === 0){
				$html	.= "</div>\n";
				$html	.= "<div class='row'>\n";
			}
			$html	.= $fttile;
			$i++;
		}

		$html	.= "</div>\n";
		$html	.= "</div>\n";
		return $html;
	}//getTileList


	/* administrator stuff */
	function getMainAdmin(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		/* the admin part of the page */
		/* show a list of records */
		$form = new Form($this->_nmtitle, $this->_nmtable, $this->_nmsingle, null, $this->ftsubmenus);
		echo $form->displayForm("S", "H", "D");
	}//getMainAdmin

	/******************
	getters and setters
	*******************/
	function getSearchFields(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		return $this->_searchFields;
	}

	function setRows($rows){
		/* deprecated */
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		$this->_rows = $rows;
	}

	function getAlphabetField(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		return $this->nmAlphabetField;
	}
	function getTitle(){
		if ($this->_debug){
			$this->_log->write(__METHOD__ );
		}

		return $this->_nmtitle;
	}


	/******************
	page
	*******************/
	function getPage($ftpagination){
		/*
		This function creates an entire page of all the videos available, or selected and displays them on a page.
		Even if the resultset is empty a HTML string will be returned indicating the empty resultset.
		*/
		$html = "<h2 class='art-postheader'>" . $this->getTitle() . " </h2>\n";
		if (count($this->_rows) == 0){
			$html .= "<p>Geen resultaten gevonden voor " . strtolower($this->_nmtitle) . ".</p>";
			return $html;
		}

		$html .= $ftpagination;

		$html .= $this->getTileList($this->getTiles());
		return $html;
	}

    public function getYear() {
//        return self::$nryear;
        return static::$nryear;

    }
    public function getLetter() {
		/* return the active letter of the alphabet */
//        return self::$nryear;
        return static::$nmalphabet;

    }

	/** todo - make prepare statement proof*/
	function getMain($nmtab, $nrCurrentPage){
		/* create an index page for the photos */
		$nmclass = strtolower(get_class($this));

		/* get the menubar contents */
		$ftmenubar = null;
		$sql = null;
		$types = "";
		$values = [];

		if (is_object($this->menuBar)){
			if ($nmclass === "persons" || $nmclass === "clubs"){
				$ftmenubar = $this->menuBar->getToolBar($this->_nmtable, ListPage::$nmalphabet, "nmalphabet", $this->alphabet);
				$sql = "SELECT count(*) AS total FROM $this->_nmtable WHERE $this->nmAlphabetField LIKE ?";
				$types = "s";
				$values = [ListPage::$nmalphabet . "%"];
			} else {
				$ftmenubar = $this->menuBar->getToolBar($this->_nmtable, ListPage::$nryear, "nryear", $this->years);
				$sql = "SELECT count(*) AS total FROM $this->_nmtable WHERE $this->nmYearField = ?";
				$types = "s";
				$values = [ListPage::$nryear];

			}
		} else {
			/* for the elements without a menubar */
			$sql = "SELECT count(*) AS total FROM $this->_nmtable";
		}

		/* get the total of items in the database */
		$nrtotal = $this->_db->select($sql, $types, $values);
		$nrtotal = $nrtotal[0]['total'];

		/* how many pages does that fill? */
		$nrTotPages = $this->getNumberPages($nrtotal, $this->nrRecordsOnPage);

		/* check if it needs pagination */
		$ftpagination = "";
		if ($nrtotal > $this->nrRecordsOnPage){
			$ftpagination = $this->addPagination($this->nrRecordsOnPage, $nmclass, null, null, $nrTotPages, $nrCurrentPage);
		}

		/* create an index page for the page */
		$nrend = $nrCurrentPage * $this->nrRecordsOnPage;
		$nrstart = $nrend - $this->nrRecordsOnPage;

		if ($nmclass === "persons" || $nmclass === "clubs"){
			/* fill $this->_rows */
			$this->getRecords($this->_nmtable, $nrstart, $nrend);
		} else {
			$this->getRecords($this->_nmtable, $nrstart, $nrend);
		}


		/* create the page content */
		$html = "<div class='art-layout-cell art-content'>\n";
		$html .= "<article class='art-post art-article'>\n";

		$html .= $ftmenubar;

		$html .= $this->getPage($ftpagination);

		$html .= "</article>\n";
		$html .= "</div>\n";

		return $html;
	}//getMain

	/******************
	tabpage
	*******************/
	function getTabPage($nmparent, $idparent, $nmtab, $nrCurrentPage, $nrTotPages){
		/*
		This function gets all the children (videos, photos, articles) associated with a parent (club, person) or other selection and are displayed as part of the tab page.
		If there is no result this function will result in an ampty string.
		*/
		if (count($this->_rows) == 0){
			return null;
		}
		$html = "<h2 class='art-postheader'>" . $this->getTitle() . "</h2>\n";

		/* add pagination */
		$html .= $this->addPagination(count($this->_rows), $nmparent, $idparent, $nmtab, $nrTotPages, $nrCurrentPage);

		/* add the content */
		$html .= $this->getTileList($this->getTiles());
		return $html;
	}

	function getTiles() : array
	{
		$fttiles = array();
		$x = 0;
		foreach ($this->_rows as $row){
			$object = new $this->nmclass($this->_db, $this->_log);
			$object->setRecord($row);
			$object->processRecord();
			$fttiles[$x] = $object->createThumbnail();
			$x++;
		}
		return $fttiles;
	}


	function addPagination($nrrows, $nmclass, $id, $nmtab, $nrTotPages, $nrCurrentPage = null){
		/* add the pagination functionality to the tabpage */

		/* init */
		$html = "";

		if ($nrTotPages < 2) {
			/* no pagination required. */
			return $html;
		}

		if (empty($nrCurrentPage)){
			$nrCurrentPage = 1;
		}
		$nrFirstPage = 1;
		$nrLastPage = $nrTotPages;
		$nrPrevPage = $nrCurrentPage - 1;
		$nrNextPage = $nrCurrentPage + 1;

		$fturl = "";

		/* if the tabname is empty than we should add the year or the alphabet. */
		if (empty($nmtab)){
			/* we are looking at year first since only one is allowed to have a value and the default on alphabet is always filled. */
			if (!empty(ListPage::$nryear)){
				$nryear = ListPage::$nryear;
			} else {
				$nmalphabet = ListPage::$nmalphabet;
			}
		}

		$ftvariables = array('nmclass', 'nmparent', 'id', 'nmtab', 'nryear', 'nmalphabet');
		foreach ($ftvariables as $ftvariable){
			if (isset(${$ftvariable}) && !empty(${$ftvariable})){
				if (empty($fturl)){
					$fturl = $ftvariable . "=" . ${$ftvariable};
				} else {
					$fturl .= "&" . $ftvariable . "=" . ${$ftvariable};
				}
			}
		}

		$fturl		= "index.php?" . $fturl;

//		/* create the html */
//		$html = "<div class='pagination'>";
//
//		/* add a form */
//		$html .= "<form action='redirect.php' accept-charset='utf-8'>\n";
//
//		if ($nrCurrentPage > 1){
//			$html .= "<a href='" . $fturl . "&nrpage=" . $nrFirstPage . "'>&lt;&lt;</a>  ";
//			$html .= "<a href='" . $fturl . "&nrpage=" . $nrPrevPage . "'>&lt;</a>  ";
//		}
//		$html .= "Dit is pagina ";
//
//		$selectBox = HtmlSelect::getNumericList("nrpage", $nrCurrentPage, $nrFirstPage, $nrLastPage);
//		/* ff trucen */
//		$html .= str_replace("<select", "<select onchange='this.form.submit()'", $selectBox);
//
//		/* add the values to the sibmit form */
//		foreach ($ftvariables as $ftvariable){
//			if (isset(${$ftvariable})){
//				$html .= "<input type='hidden' name='$ftvariable' value='${$ftvariable}'>\n";
//			}
//		}
//		$html .= "<noscript><input type='submit' value='Submit'></noscript>\n";
//
//		$html .= " van " . $nrTotPages . " ";
//		if ($nrCurrentPage < $nrTotPages){
//			$html .= "<a href='" . $fturl . "&nrpage=" . $nrNextPage . "'>&gt;</a>  ";
//			$html .= "<a href='" . $fturl . "&nrpage=" . $nrLastPage . "'>&gt;&gt;</a>  ";
//		}
//		$html .= "</form>\n";
//		$html .= "</div>\n";

		/* init */
		$firstIsDisplayed	= false;
		$lastIsDisplayed	= false;

		/* create the html for the previous button */
		$htmlPrevious = "<li>\n";
		$htmlPrevious .= "  <a class='page-link' href='" . $fturl . "&nrpage=1' aria-label='Previous'>\n";
		$htmlPrevious .= "    <span aria-hidden='true'>&laquo;</span>\n";
		$htmlPrevious .= "    <span class='sr-only'>Previous</span>\n";
		$htmlPrevious .= "  </a>\n";
		$htmlPrevious .= "</li>\n";

		$htmlLast = "<li>\n";
		$htmlLast .= "  <a class='page-link' href='" . $fturl . "&nrpage=" . $nrTotPages . "' aria-label='Previous'>\n";
		$htmlLast .= "    <span aria-hidden='true'>&raquo;</span>\n";
		$htmlLast .= "    <span class='sr-only'>Next</span>\n";
		$htmlLast .= "  </a>\n";
		$htmlLast .= "</li>\n";

		$htmlCenter = "";

		/* startposition is 1 and end position is the last page. But when the number of pages is more than seven we
		use seven as a max number of pages and add the prrevious and next buttons.
		*/
		if ($nrTotPages > 7){
			/* there should always be seven positions displayed */

			$nrStartPos = $nrCurrentPage - 3;
			$nrEndPos	= $nrCurrentPage + 3;

			if ($nrStartPos < 1){
				$nrStartPos = 1;
				$nrEndPos	= 7;
			}
			if ($nrEndPos > $nrTotPages){
				$nrStartPos = $nrTotPages - 6;
				$nrEndPos	= $nrTotPages;
			}
		} else {
			$nrStartPos	= 1;
			$nrEndPos	= $nrTotPages;
		}

		for ($i=$nrStartPos; $i <= $nrEndPos; $i++){
			/* different datatypes so only == and not ===*/
			if ($i == $nrCurrentPage){
		  		$htmlCenter .= "<li class='active'><a href='" . $fturl . "&nrpage=" . $i . "'>" . $i . "</a></li>\n";
			} else {
		  		$htmlCenter	.= "<li><a href='" . $fturl . "&nrpage=" . $i . "'>" . $i . "</a></li>\n";
			}

			if ($i === 1){
				$firstIsDisplayed = true;
			}
			/* different datatypes so only == and not ===*/
			if ($i == $nrTotPages){
				$lastIsDisplayed = true;
			}
		}

		$html = "<ul class='pagination'>\n";

		/* the previous button but only display it when the first page is not displayed. */
		if (!$firstIsDisplayed){
			$html	.= $htmlPrevious;
		}

		/* add the middle part */
		$html	.= $htmlCenter;

		/* the next button but only when the last button is not displayed. */
		if (!$lastIsDisplayed){
			$html	.= $htmlLast;
		}

		$html .= "</ul>\n";

		return $html;
	}

	function getNumberPages($nrtotal, $nrRecordsOnPage){
		return round(($nrtotal/$nrRecordsOnPage) + 0.5, 0);
	}

	/** todo - make prepare statement proof*/
	function searchTable($ftvaluelist, $nmsearchtype){
		/* search the searcable fields of the table for values
		search is done case insensitive
		*/

		/* init */
		$ftfieldlist	= $this->getSearchFields();

		if (!is_array($ftfieldlist)){$ftfieldlist = array($ftfieldlist);}
		if (!is_array($ftvaluelist)){$ftvaluelist = array($ftvftvaluelistaluelist);}

		/* make the values uppercase */
		$ftvaluelist	= array_map('strtoupper', $ftvaluelist);

		/* create the query */
		$sql	= "SELECT * FROM " . $this->_nmtable . " WHERE ";

		/* create the where clause */
		$ftwhere = "";

		/* create the where */
		$nmfunction = "createWhere" . $nmsearchtype;

		$ftwhere	= $this->$nmfunction($ftfieldlist, $ftvaluelist);

		$sql	.= $ftwhere;

		$this->_rows	= $this->_db->select($sql);
	}

	function createWhereEXACT($ftfieldlist, $ftvaluelist){
		/* create the where clause for the EXACT search query */
		$ftwhere	= "";
		foreach($ftfieldlist as $ftfield){
			if (empty($ftwhere)){
				$ftwhere	.= "UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
			} else {
				$ftwhere	.= " OR UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
			}

		}
		return $ftwhere;
	}//createWhereExact

	function createWhereALL($ftfieldlist, $ftvaluelist){
		/* create the where clause for the ALL search query */
		$ftwhere	= "";
		foreach($ftfieldlist as $ftfield){

			$ftcondition = "";
			foreach($ftvaluelist as $ftvalue){
				if (empty($ftcondition)){
					$ftcondition	.= "UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
				} else {
					$ftcondition	.= " AND UCASE(" . $ftfield . ") like '%" . $ftvaluelist[0] . "%'";
				}
			}

			if (empty($ftwhere)){
				$ftwhere	.= "(" . $ftcondition . ")";
			} else {
				$ftwhere	.= " OR (" . $ftcondition . ")";
			}

		}
		return $ftwhere;
	}

	function createWhereANY($ftfieldlist, $ftvaluelist){
		/* create the where clause for the ANY search query */
		$ftwhere	= "";
		foreach($ftfieldlist as $ftfield){

			foreach($ftvaluelist as $ftvalue){
				if (empty($ftwhere)){
					$ftwhere	.= "UCASE(" . $ftfield . ") like '%" . $ftvalue . "%'";
				} else {
					$ftwhere	.= " OR UCASE(" . $ftfield . ") like '%" . $ftvalue . "%'";
				}
			}

		}
		return $ftwhere;
	}
}
?>
