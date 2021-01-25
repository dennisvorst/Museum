<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once("HtmlTabElement.php");

class HtmlTabPage{
	protected $_db;
	protected $_id;
	private $_tabsCount = 0;
	private $_tabs = [];

	/* constructor */
	function __construct(MysqlDatabase $db, int $id){
		/** Id must be a numeric integer value  */
		if (!($id > 0))	
		{
			throw new InvalidArgumentException('HtmlTabElement: reference not allowed to be empty.');
		} 
		$this->_id	= $id;
		$this->_db	= $db;
	}


	function getTab($nmclass, $list, $nmCurrentTab, $nrCurrentPage, $id) : string 
	{
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

		/* make sure the classname is uppercase only the first letter. */
		$nmclass = ucfirst(strtolower($nmclass));

		/* process the array */
		/* first retrieve all the content of the pages but only save the ones that have content */
		$pages = array();
		$titles = array();
		foreach ($list as $item){

			$item = ucfirst($item);
			$nminstance = new $item($this->_db);

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
		}

		$this->_setActiveTab($nmCurrentTab);

		if (count($this->_tabs) > 0)
		{

			/* create the outer div */
			$html .= "<div class='tabs'>\n";
			$html .= $this->_createTabStrip();
			$html .= $this->_createTabContent();
			$html .= "</div>\n";
		} 
		return $html;
	}

	function addTab(string $reference, string $title, string $content, bool $isActive = null){
		/**
		 * Tabs cannot:
		 * - have two or more active tabs
		 * - cannot have the same reference 
		 */
		$i=0;
		$isActive = (isset($isActive) && !empty($isActive)  ? $isActive : false);				
		if ($isActive && count($this->_getActiveTabs()) > 0) {throw new Exception('HtmlTabPage::addTab: adding too many active tabs.');}
		if (!empty($reference) && $this->_referenceExists($reference))  {throw new Exception('HtmlTabPage::addTab: Reference already exists');}

		$this->_tabs[$this->_tabsCount++] = new HtmlTabElement($reference, $title, $content, $isActive);
	}

	private function _createTabStrip() : string {
		$html = "<ul class='tab-links'>\n";
		foreach($this->_tabs as $tab)
		{
			$html .= $tab->getTabButton();
		}
		$html .= "</ul>\n\n";
		return $html;
	}

	private function _createTabContent() : string {
		$html = "<div class='tab-content'>\n";
		foreach($this->_tabs as $tab)
		{
			$html .= $tab->getTabContent();
		}
		$html .= "</div>\n\n";
		return $html;
	}

	private function _referenceExists($reference) : bool
	{
		foreach($this->_tabs as $tab)
		{
			if ($reference == $tab->getReference())
			{
				return true;
			}
		}
		return false;
	} 

	private function _getActiveTabs() : array 
	{
		$activeTabs = [];
		for ($i=0; $i < count($this->_tabs); $i++)
		{
			if ($this->_tabs[$i]->isActive())
			{
				array_push($activeTabs, $i);
			} 
		}
		return $activeTabs;
	}

	private function _setActiveTab($activeTab) : void 
	{
		if (count($this->_tabs) > 0)
		{
			switch(count($this->_getActiveTabs()))
			{
				case  1:
					/* correct */
					break;
				default: 
					/* reset all */
					foreach ($this->_tabs as $tab)
					{
						$tab->setInactive();
					} 
//					break;
				case  0:
					/* make one active */
					if (empty($activeTab))
					{
						$this->_tabs[0]->setActive();
					} else {
						foreach ($this->_tabs as $tab)
						{
							if ($activeTab == $tab->getReference())
							{
								$tab->setActive();
							} 
						} 
						break;	
					}

					break;
			}
		}
	}

	function countTabs() : int
	{
		return count($this->_tabs);
	}
}
?>
