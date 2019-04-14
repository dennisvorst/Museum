<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once("HtmlTabElement.php");

class HtmlTabPage{
	var $id;
	private $_numberOfTabs;
	private $_tabs;

	/* constructor */
	function __construct($id){
		$this->id	= $id;
	}

	function getTab($nmclass, $list, $nmCurrentTab, $nrCurrentPage, $id){
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
			$nminstance = new $item();

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
				if (strtolower($nmCurrentTab) == strtolower($item))
				{
					$this->addTab(strtolower($item), $titles[$item], $pages[$item], true);
				}else {
					$this->addTab(strtolower($item), $titles[$item], $pages[$item], false);
				}					
			}

			/* create the outer div */
			$html = "<div class='tabs'>\n";
			$html .= $this->_createTabStrip();
			$html .= $this->_createTabContent();
			$html .= "</div>\n";
		}
		return $html;
	}

	function addTab(string $reference, string $title, string $content){
		$this->_tabs[$this->_numberOfTabs++] = new HtmlTabElement($reference, $title, $content);
	}

	private function _createTabStrip(){
		$html = "<ul class='tab-links'>\n";
		foreach($this->_tabs as $tab)
		{
			$html .= $tab->getTabButton();
		}
		$html .= "</ul>\n\n";
	}

	private function _createTabContent(){
		$html = "<div class='tab-content'>\n";
		foreach($this->_tabs as $tab)
		{
			$html .= $tab->getTabButton();
		}
		$html .= "</div>\n\n";
	}

}
?>
