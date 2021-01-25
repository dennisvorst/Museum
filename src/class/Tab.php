<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class Tab{
	protected $_id;
	protected $_db;
	/* constructor */
	function __construct(MysqlDatabase $db, int $id){
		$this->_id	= $id;
		$this->_db	= $db;
	}

	static function getTab(string $nmclass, array $list, int $nmCurrentTab, int $nrCurrentPage, int $id, MysqlDatabase $db){
		/* pay attention cause this might hurt a little.
		We have created an array with all the tabs for Clubs. Each class has a function that
		starts with getClub... followed by the name of the class. So we should be able to do
		this in one loop.
		- get the value of the arrauy
		- create the new element
		- call the function getClub... followed by the name of the class
		- if the rows are not empty than create the tab and its content
		*/

		/* init */
		$html 		= "";
		$tabs 		= "";
		$tabcontent = "";

		/* if the result set is empty return nothing */
		if (empty($list)) {
			return $html;
		}

		/* make sure the classname is uppercase only the first letter. */
		$nmclass = ucfirst(strtolower($nmclass));

		/* if the tab is empty make it the first value */
		if (empty($nmCurrentTab)){
			$nmCurrentTab = $list[0];
		}

		/* process the array */
		/* first retrieve all the content of the pages but only save the ones that have content */
		$pages = array();
		$titles = array();
		foreach ($list as $item){

			$item = ucfirst($item);
			$nminstance = new $item($db);

			/* create a different content for the selected and the unselected tabs */
			if (strtolower($nmCurrentTab) != strtolower($item)){
				/* unselected */
				$page = $nminstance->{"get" . $nmclass . $item}($id, $item, 1);
			} else {
				/* selected */
				$page = $nminstance->{"get" . $nmclass . $item}($id, $nmCurrentTab, $nrCurrentPage);
			}

			if (!empty($page)){
				$titles[strtolower($item)]	= $nminstance->getTitle();
				$pages[strtolower($item)]	= $page;
			}
			$nminstance = null;
		}

		/* then make sure that the active tab that we have selected exists in the remaining pages. If not select the first one.*/
		if (!empty($pages)){
			$items = array_keys($pages);
			if (!in_array($nmCurrentTab, $pages) || empty($pages[$nmCurrentTab])){
				$items = array_keys($pages);
				$nmCurrentTab = $items[0];
			}

			/* now list the pages */
			foreach ($items as $item){
				if (strtolower($nmCurrentTab) == strtolower($item)){
					$tabs .= "<li class='active'><a data-toggle='tab' href='#" . strtolower($item) . "'>" . $titles[$item] . "</a></li>\n";
					$tabcontent .= "<div id='" . strtolower($item) . "' class='tab active'>\n" . $pages[$item] . "</div>\n";
				} else {
					$tabs .= "<li><a data-toggle='tab' href='#" . strtolower($item) . "'>" . $titles[$item] . "</a></li>\n";
					$tabcontent .= "<div id='" . strtolower($item) . "' class='tab'>\n" . $pages[$item] . "</div>\n";
				}
			}

			/* create the tabs */
			$tabs = "<ul class='tab-links'>\n" .$tabs . "</ul>\n\n";

			/* create the tabcontent */
			$tabcontent = "<div class='tab-content'>\n" .$tabcontent . "</div>\n\n";

			/* create the outer div */
			$html = "<div class='tabs'>\n" . $tabs . $tabcontent . "</div>\n";
		}
		return $html;
	}
}
?>
