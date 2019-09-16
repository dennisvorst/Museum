<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "HtmlField.php";
require_once "HtmlSelect.php";
require_once "MainPage.php";

class ListPage extends MainPage{
	var $debug 			= false;

	var $nmtitle;
	var $ftrows;
	var $nmtable;
	var $nmsingle;

	var $nmclass;

	var $searchFields	= array("ListPageContent");
	var $orderByFields;
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
	function __construct(){
		parent::__construct();
	}

	function withName($ftsearch) {
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$ftwhere	= $this->getWhere();
		$ftorderby	= $this->getOrderBy();

		$query = "SELECT * FROM $this->nmtable ";
		if (!empty($ftwhere)){
			$query .= $ftwhere;
		}
		if (!empty($ftorderby)){
			$query .= $ftorderby;
		}
		$this->ftrows	= $this->queryDb($query);
	}

	function withFeatured() {
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$query = "SELECT * FROM $this->nmtable WHERE is_featured = 1 ";
		if (!empty($ftorderby)){
			$query .= $ftorderby;
		}
		$this->ftrows	= $this->queryDb($query);
	}

	function getOrderBy(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$ftorderby = "";
		if (!empty($this->orderByFields)){
			$ftorderby = " ORDER BY " . $this->orderByFields . " ";
		}
		return $ftorderby;
	}

	function getRecords($nmtable, $nrrowsstart, $nrrowsend){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get a list of records based on the year or the alphabet */
		$ftwhere = "";
		$ftquery = "SELECT * FROM $nmtable ";

		/* where */
		if (!empty($this->nmYearField) && !empty(ListPage::$nryear)){
			$ftwhere .= "WHERE $this->nmYearField = " . ListPage::$nryear;
		}
		if (!empty($this->nmAlphabetField) && !empty(ListPage::$nmalphabet)){
			if (empty($ftwhere)){
				$ftwhere .= "WHERE $this->nmAlphabetField LIKE '" . ListPage::$nmalphabet . "%' ";
			} else {
				$ftwhere .= "AND $this->nmAlphabetField LIKE '" . ListPage::$nmalphabet . "%' ";
			}
		}
		$ftquery .= $ftwhere . " ";

		/* order by */
		$orderBy = "";
		if (!empty($this->orderByFields)){
			for ($i = 0; $i < count($this->orderByFields); $i++){
				if (empty($orderBy)){
					$orderBy = "ORDER BY `". $this->orderByFields[$i] . "` ASC ";;
				} else {
					$orderBy .= ", `". $this->orderByFields[$i] . "` ASC ";
				}
			}
		} else {
			$orderBy = "";
		}
		$ftquery .= $orderBy;

		/* limit */
		if ((!empty($nrrowsstart) or $nrrowsstart === 0)and !empty($nrrowsend)){
			$ftquery .= "LIMIT $nrrowsstart, $nrrowsend";
		}

		$this->ftrows = $this->queryDB($ftquery);
	}//getRecords

	static function getStartYear($nmtable){
		/* get the year to start with in the menu */
		$ftquery = "SELECT MIN(nryear) AS nryear FROM $nmtable";
		$db = new Database();
		$nmvalue = $db->queryDb($ftquery);
		ListPage::$nryear = $nmvalue[0]['nryear'];
	}

	function getYears($nmtable){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the years from a tables */
		$rows = $this->getData("DISTINCT(nryear) as nryear", $nmtable, "", "nryear", "");

		$years = array();
		for ($x=0; $x < count($rows); $x++){
			$years[$x] = $rows[$x]['nryear'];
		}
		return $years;
	}

	function getAlphabet($nmtable, $nmfield){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* get the alphabet from a tables */
		$letters = array();

        $rows = $this->getData("DISTINCT(UPPER(LEFT({$nmfield},1))) AS letter", $nmtable, "", $nmfield, "");
		for ($x=0; $x < count($rows); $x++){
			$letters[$x] = $rows[$x]['letter'];
		}
		return $letters;
	}

	function getTileList($fttiles, $nmclasstag = null){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
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
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* the admin part of the page */
		/* show a list of records */
		$form = new Form($this->nmtitle, $this->nmtable, $this->nmsingle, null, $this->ftsubmenus);
		echo $form->displayForm("S", "H", "D");
	}//getMainAdmin

	/* deprecated? */
	function createEditRows(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		/* create an index page for the articles */
		$this->getRecords($this->nmtable, 0, 30);
		$keys	= array_keys($this->ftrows[0]);

		$i = 0;
		foreach ($this->ftrows as $ftrow){
			/* Step therough the array */

			for ($j=0; $j < count($keys); $j++){
				/* get the key name, the value and start an object and a variable  */
				$key	= $keys[$j];
				$value	= $ftrow[$key];
				$field	= "";
				$object = new $this->nmsingle();

				/* Look for the function that creates the editable field */
				if ($key === "id" . $this->nmsingle ) {
					$field = HtmlField::createField("id{$this->nmsingle}", "hidden", $value);
				} else {
					if (method_exists( $object, "getEdit" . ucfirst($key))){
						$field = $object->{"getEdit" . ucfirst($key)}($value);
					} else {
						/* if it is empty donot add a value to the input field */

						$field = HtmlField::createField($key, "text", $value);
					}

				}
				$record[$j] = $field;
			}
			$records[$i]	= $record;
			$i++;
		}

		/* create the table */
		$htmltable = new HtmlTable();
		$html = $htmltable->createHtmlTable($object->getLabels(), $records);

		return $html;
	}

	/******************
	getters and setters
	*******************/
	function getSearchFields(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->searchFields;
	}

	function setRows($ftrows){
		/* deprecated */
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		$this->ftrows = $ftrows;
	}

	function getAlphabetField(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmAlphabetField;
	}
	function getTitle(){
		if ($this->debug){
			print_r(__METHOD__ . "<br/>");
		}

		return $this->nmtitle;
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
		if (count($this->ftrows) == 0){
			$html .= "<p>Geen resultaten gevonden voor " . strtolower($this->nmtitle) . ".</p>";
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

	function getMain($nmtab, $nrCurrentPage){
		/* create an index page for the photos */
		$nmclass = strtolower(get_class($this));

		/* get the menubar contents */
		$ftmenubar = null;
		$ftquery = null;
		if (is_object($this->menuBar)){
			if ($nmclass === "persons" || $nmclass === "clubs"){
				$ftmenubar = $this->menuBar->getToolBar($this->nmtable, ListPage::$nmalphabet, "nmalphabet", $this->alphabet);
				$ftquery = "SELECT count(*) AS total FROM $this->nmtable WHERE $this->nmAlphabetField LIKE '" . ListPage::$nmalphabet . "%'";
			} else {
				$ftmenubar = $this->menuBar->getToolBar($this->nmtable, ListPage::$nryear, "nryear", $this->years);
				$ftquery = "SELECT count(*) AS total FROM $this->nmtable WHERE $this->nmYearField = '" . ListPage::$nryear . "'";
			}
		} else {
			/* for the elements without a menubar */
			$ftquery = "SELECT count(*) AS total FROM $this->nmtable";
		}

		/* get the total of items in the database */
		$nrtotal = $this->queryDb($ftquery);
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
			/* fill $this->ftrows */
			$this->getRecords($this->nmtable, $nrstart, $nrend);
		} else {
			$this->getRecords($this->nmtable, $nrstart, $nrend);
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
		if (count($this->ftrows) == 0){
			return null;
		}
		$html = "<h2 class='art-postheader'>" . $this->getTitle() . "</h2>\n";

		/* add pagination */
		$html .= $this->addPagination(count($this->ftrows), $nmparent, $idparent, $nmtab, $nrTotPages, $nrCurrentPage);

		/* add the content */
		$html .= $this->getTileList($this->getTiles());
		return $html;
	}

	function getTiles(){
		$fttiles = array();
		$x = 0;
		foreach ($this->ftrows as $row){
			$object = new $this->nmclass();
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
		$sql	= "SELECT * FROM " . $this->nmtable . " WHERE ";

		/* create the where clause */
		$ftwhere = "";

		/* create the where */
		$nmfunction = "createWhere" . $nmsearchtype;

		$ftwhere	= $this->$nmfunction($ftfieldlist, $ftvaluelist);

		$sql	.= $ftwhere;

		$this->ftrows	= $this->queryDb($sql);
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
