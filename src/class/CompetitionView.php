<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "PageView.php";
require_once "GamesView.php";
require_once "ParticipantsView.php";

class CompetitionView extends PageView implements iPageView
{
	/* constructor */

	protected $_id; 
	protected $_name; 
	protected $_sub; 

	protected $_gameCollection;
	protected $_participantCollection;

	function __construct(array $row)
	{
		if (empty($row)) 
		{
			throw new InvalidArgumentException("Club is mandatory");
		}

		/** create the object */
		$competition = $row['competition'];

		$this->_id = $competition['id'];
		$this->_name = $competition['name'];
		$this->_sub = $competition['sub'];

		$this->_url = $this->_getNameWithUrl();

		/** participants */
		$this->_participantCollection = (isset($competition['participants']) ? $competition['participants'] : []);

		/** games */
		$this->_gameCollection = (isset($competition['games']) ? $competition['games'] : []);

	}

	function showThumbnail() : string
	{
		return "
		<div class='card'>
			{$this->_url}
		</div>";
	}

	function show() : string
	{
		/** prepare */
		$participants = $this->_showParticipants();
		$games = $this->_showGames();

		/** show */		
		return "
		<h1>{$this->_name}</h1>

		{$participants}

		{$games}
		";
	}

	function _getNameWithUrl(){
		return "<a href='" . $this->_getUrl(["option"=>"competition", "id"=>$this->_id]) . "' >". $this->_getFullName() . "</a>";
	}

	protected function _getFullName(){
		if (empty($this->nmsub)){
			return $this->_name;
		} else {
			return $this->nmcompetition . " " . $this->nmsub;
		}
	}

	/** child records */
	protected function _showParticipants() : string 
	{
		$view = new ParticipantsView($this->_participantCollection);
		return $view->show();
	}

	protected function _showGames() : string 
	{
		$view = new GamesView($this->_gameCollection);
		return $view->show();
	}

}
?>