<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
//require_once "ListPage.php";

class MenuBar{
	static $nrcolumns = 26; /** in case of alfabet */
	static $nrfirst = 1;
	static $nrlast = 0;
	static $stripnumber;
	static $option;
	
	protected $_db;
	/* constructor */
	function __construct(MysqlDatabase $db)
	{
		$this->_db = $db;
		
	}

	function getToolBar($nmtable, $nmvalue, $cdtype, $rows){
		/* create and display the toolbar.
		$nmtable	= the database tanle name
		$nmvalue	= the current selected value either a year or a single letter
		$cdtype		= indicates year or alphabet
		$rows		= an array of all the selectable values
		*/

		/**********************
		Process the information
		***********************/
		/* init the year stuff */
		if ($cdtype == "nryear"){
			/* only twelve fit on the page */
			MenuBar::$nrcolumns = 12;
			/* if no value is selected get the last value */
			if (empty($nmvalue)){
//				ListPage::getStartYear($this->_db, $nmtable);
//				$nmvalue = ListPage::$nryear;
			}
		} else {
			/** not all letters in the alphabet may be present */
			MenuBar::$nrcolumns = count($rows);
		}

		/** 
		 * calculate the number of strips it takes to display all elements
		 * f.i. 17 items in sets of 12 is spread over 2 strips
		 * */ 
		if (empty(MenuBar::$stripnumber)){
			MenuBar::$stripnumber = floor(array_search($nmvalue, $rows)/MenuBar::$nrcolumns) + 1;
		}
		MenuBar::$option = $nmtable;

		/* calculate the total number of batches */
		MenuBar::$nrlast = ceil((count($rows) / MenuBar::$nrcolumns));

		/* calculate the starting and end point of the current toolbar */
		$firstValue = $rows[(MenuBar::$stripnumber - 1) * MenuBar::$nrcolumns];
		/** never go past the last value in the row */
		$lastValue	= ((MenuBar::$stripnumber * MenuBar::$nrcolumns) -1 > count($rows) ? count($rows)-1 : (MenuBar::$stripnumber * MenuBar::$nrcolumns) -1);
		$lastValue	= $rows[$lastValue];

		/* print the list of values */
		$items = [];
		foreach ($rows as $row)
		{
			if ($row >= $firstValue && $row <= $lastValue)
			{
				$items[] = $row;
			}
		}

		/*******************
		 collect
		 *******************/
		/* We only display the back buttons when we are no longer in the first bracket */
		$buttons = [];
		if (MenuBar::$stripnumber > 1){
			/* create an array of key-value pairs */
			$ftitems = ["option" => $nmtable, $cdtype => $nmvalue, "nrcurrent"=> MenuBar::$nrfirst];
			/* create the url for the FIRST (|<) button */
			$fturl = $this->getUrl($ftitems);
			$buttons[] = $this->getHyperlink($fturl, "|&lt;");

			/* create an array of key-value pairs */
			$ftitems = ["option" => $nmtable, $cdtype => $nmvalue, "nrcurrent"=> $this->getPrevious()];
			/* create the url for the NEXT (<<) button */
			$fturl = $this->getUrl($ftitems);
			$buttons[] = $this->getHyperlink($fturl, "&lt;&lt;");
		}

		/** the menu buttons */
		foreach ($items as $item)
		{
			$fturl = $this->getUrl(["option" => $nmtable, $cdtype => $item]);
			$buttons[] = $this->getHyperlink($fturl, $item, ($item == $nmvalue));
		}

		/* only display the next bracket if the current bracket is not the last one. */
		if (MenuBar::$stripnumber < MenuBar::$nrlast){
			/* create an array of key-value pairs */
			$ftitems = ["option"=>$nmtable, $cdtype=>$nmvalue, "nrcurrent"=> $this->getNext(MenuBar::$nrlast)];
			/* create the url for the NEXT (>>) button */
			$fturl = $this->getUrl($ftitems);
			$buttons[] = $this->getHyperlink($fturl, "&gt;&gt;");

			/* create an array of key-value pairs */
			$ftitems = ["option"=>$nmtable, $cdtype=>$nmvalue, "nrcurrent"=> MenuBar::$nrlast];
			/* create the url for the Last (>|) button */
			$fturl = $this->getUrl($ftitems);
			$buttons[] = $this->getHyperlink($fturl, "&gt;|");
		}

		$buttons = implode("\n", $buttons);
		/*******************
		 construct the toolbar.
		 *******************/
		$html = "
		<nav class='navbar navbar-expand-lg navbar-light bg-light'>
	        <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
				{$buttons}
			</ul>
		</nav>
		";

		return $html;
	}//getToolBar

	function getHyperlink(string $fturl, string $ftlabel, bool $active = false) : string
	{
		$active = ($active ? " active" : "");

		return "
		<li class='nav-item{$active}'>
			<a class='nav-link' href='index.php?{$fturl}'>{$ftlabel}</a>
		</li>";
	}

	function getPrevious(){
		/* determine the value of the previous identifier */
		if (MenuBar::$stripnumber > 1){
			return MenuBar::$stripnumber - 1;
		} else {
			return 1;
		}
	}
	function getNext($nrmaxcurrent){
		/* determine the value of the next identifier */
		if (MenuBar::$stripnumber < $nrmaxcurrent){
			return MenuBar::$stripnumber + 1;
		} else {
			return $nrmaxcurrent;
		}
	}

    function GetJaarFromEntiteit(){

		/* first set the default values */
		$max_hits                       = 25;
		$include_previous   = 1;
		$include_next       = 1;

        /* find out the number of values in the database */
//        $hits           = $this->database->GetData("COUNT(DISTINCT({$this->fieldname})) as jaar", $this->entname, "", $this->fieldname, "");
		$sql = "SELECT COUNT(DISTINCT({$this->fieldname})) AS jaar FROM {$this->entname} ORDER BY {$this->fieldname}"; 
        $hits           = $this->_db->select($sql);
        $hits           = $hits[0]['jaar'];

		/* if there are more records than can be displayed we need to cut them in pieces */
        if ($max_hits >= $hits){
			/* we donot need to add navigation buttons. */
            $this->lijst = [];
//			$data = $this->database->GetData("DISTINCT({$this->fieldname}) as jaar", $this->entname, "", $this->fieldname, "");
			$sql = "SELECT DISTINCT({$this->fieldname}) as jaar FROM {$this->entname} ORDER BY {$this->fieldname}";
			$data = $this->_db->select($sql);
			

            for ($x=0;$x<count($data);$x++){
				/* if the value is the selected value than leave out the hyperlink */
                if ($data[$x]['jaar'] == $this->jaar) {
                    $this->lijst[$x] = "<td class='submenu'>" . $data[$x]['jaar'] . "</a></td>" . chr(10);
                } else {
                    $this->lijst[$x] = "<td class='submenu'><A HREF='index.php?year=" . $data[$x]['jaar'] . "'>" . $data[$x]['jaar'] . "</a></td>" . chr(10);
                } // endif
            }
        } else {
			/* we need to reduce the list to a number of values equal to $max_hits and add navigation buttons */

			/* So in order to cut things up we need to know where the begin (min) and the end (max) is */
			$my_select_array = ["min", "max"];
			for ($y=0; $y<count($my_select_array); $y++){
//$data = $this->database->GetData("{$my_select_array[$y]}(nrjaar) as jaar", $this->entname, "", "", "1");
			$sql = "{$my_select_array[$y]}(nrjaar) as jaar FROM {$this->entname} LIMIT 1";
			$data = $this->_db->select($sql);
                ${"my_value_" . $my_select_array[$y]} = $data[0]['jaar'];
			}

			$where  = "";
            if (isset($_SESSION['my_valrep_max']) and $_SESSION['my_valrep_max'] !=""
				and isset($_SESSION['my_valrep_min']) and $_SESSION['my_valrep_min'] != ""){

				if (isset($_SESSION['my_navigation']) and $_SESSION['my_navigation'] == "up"){
					$where = "nrjaar > {$_SESSION['my_valrep_max']}";
				}
				if (isset($_SESSION['my_navigation']) and $_SESSION['my_navigation'] == "down"){
					/* we need to make sure that we are only going down 25 (or the amount set in $max_hits) from the last known value
					so we need to give a constrint for both lowest and highest value
					*/
					$where  = "nrjaar < {$_SESSION['my_valrep_min']}";
//					$data   = $this->database->GetData("DISTINCT({$this->fieldname}) as jaar", $this->entname, $where, $this->fieldname, "");
					$sql = "SELECT DISTINCT({$this->fieldname}) as jaar FROM {$this->entname} {$where} ORDER BY {$this->fieldname}";
					$data   = $this->_db->select($sql);
					$data   = array_reverse($data);
                    $where      .= " AND nrjaar >= {$data[$max_hits-1]['jaar']}";
				}
			}

			/* finally retrieve the values you want */
//			$data = $this->database->GetData("DISTINCT({$this->fieldname}) as jaar", $this->entname, $where, $this->fieldname, $max_hits);
			$sql = "SELECT DISTINCT({$this->fieldname}) as jaar FROM {$this->entname} {$where} ORDER BY {$this->fieldname} LIMIT {$max_hits}";
			$data = $this->_db->select($sql);
            /* set the first and last value */
            $last_occ           = count($data)-1;
            $my_valrep_min      = $data[0]['jaar'];
            $my_valrep_max      = $data[$last_occ]['jaar'];

            /* if the min value is in the first value of the list than do not add the << navigation */
            $a=0;
            if ($data[0]['jaar']                != $my_value_min){
//                $this->lijst[$a]                = "<A HREF='index.php?my_valrep_min=" . $my_valrep_min . "&my_valrep_max=" . $my_valrep_max . "&my_navigation=down'><<</A></td>";
                $this->lijst[$a]                = "<A HREF='index.php?my_valrep_min=" . $my_valrep_min . "&my_valrep_max=" . $my_valrep_max . "&my_navigation=down'></A></td>";
                $a+=1;
            }

            /* if either the min or the max value is not in the list we must add it to the values*/
            for ($x=0;$x<count($data);$x++){
				/* if the value is the selected value than leave out the hyperlink */
                if ($data[$x]['jaar'] == $this->jaar) {
                    $this->lijst[$a]    = "<td class='submenu'>" . $data[$x]['jaar'] . "</A></td>" . chr(10);
                } else {
                    $this->lijst[$a]    = "<td class='submenu'><A HREF='index.php?year=" . $data[$x]['jaar'] . "'>" . $data[$x]['jaar'] . "</A></td>" . chr(10);
                } // endif
                $a+=1;
            }

            /* if the max value is in the last value of the list than do not add the >> navigation */
            if ($data[$last_occ]['jaar'] != $my_value_max){
                $this->lijst[$a]  = "<A HREF='index.php?my_valrep_min=" . $my_valrep_min . "&my_valrep_max=" . $my_valrep_max . "&my_navigation=up'>>></A></td>";
                $a+=1;
            }
			unset($x);
        }
        return $this->lijst;
    } //function GetJaarFromEntiteit

	/* todo : marked deprecated. Remove.*/
	function getUrl($ftitems){
		/* create the url */
		$ftkeys = array_keys($ftitems);
		for ($x=0; $x < count($ftkeys); $x++){
			if (empty($fturl)){
				$fturl = $ftkeys[$x] . "=" . $ftitems[$ftkeys[$x]];
			} else {
				if (!empty($ftkeys[$x]) && !empty($ftitems[$ftkeys[$x]])){
					$fturl = $fturl . "&" . $ftkeys[$x] . "=" . $ftitems[$ftkeys[$x]];
				}
			}
		}
		return $fturl;
	}
}
?>