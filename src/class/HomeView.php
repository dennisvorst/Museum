<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "ArticlesView.php";
require_once "ClubsView.php";
require_once "PersonsView.php";
require_once "PhotosView.php";
require_once "VideosView.php";

class HomeView
{
  protected $_collection = [];

	function __construct(array $rows)
	{
		if (empty($rows)) 
		{
			throw new InvalidArgumentException("Home is mandatory");
		}

    $this->_articlesCollection= $rows['articles'];
    $this->_clubsCollection		= $rows['clubs'];
    $this->_personsCollection	= $rows['persons'];
    $this->_photosCollection	= $rows['photos'];
    $this->_videosCollection	= $rows['videos'];
	}


	function show() : string
	{
    /** prepare */
    $html = "";

    $view = new ArticlesView($this->_articlesCollection);
    $html .= $view->show();

    $view = new ClubsView($this->_clubsCollection);
    $html .= $view->show();

    $view = new PersonsView($this->_personsCollection);
    $html .= $view->show();

    $view = new PhotosView($this->_personsCollection);
    $html .= $view->show();

    $view = new VideosView($this->_videosCollection);
    $html .= $view->show();

    /** create */
    return $html;
	}
}
?>