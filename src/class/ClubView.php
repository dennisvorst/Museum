<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";

class ClubView implements iView
{
	/* constructor */

	protected $_id; 
	protected $_url;
	protected $_name;
	protected $_logo;

	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Video is mandatory");
		}

		/** create the object */
		$object = json_decode($json);
	
		print_r($object);

		$this->_id = $object->id;
		$this->_url = $object->url;
		$this->_name = $object->name;
		$this->_logo = $object->logo;

		/** optional values */
//		$this->_alignment = (property_exists($object, "alignment") ? $object->alignment : null);
	}

	function showThumbnail() : string
	{
		return "
		<div class='card'>
			<div class='container'>
			{$this->_logo}
			<div class='row'>
				<div class='card-body'>
					<h5 class='card-title'>{$this->_name}</h5>
					<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href='{$this->_url}'>Lees meer</a>
				</div>
				</div>
			</div>
		</div>";
	}

	function show() : string
	{
		return "
		<h1>{$this->_name}</h1>

		<!-- Nav tabs -->
		<ul class='nav nav-tabs' id='myTab' role='tablist'>
			<li class='nav-item' role='presentation'>
				<button class='nav-link active' id='home-tab' data-bs-toggle='tab' data-bs-target='#home' type='button' role='tab' aria-controls='home' aria-selected='true'>Home</button>
			</li>
			<li class='nav-item' role='presentation'>
				<button class='nav-link' id='profile-tab' data-bs-toggle='tab' data-bs-target='#profile' type='button' role='tab' aria-controls='profile' aria-selected='false'>Profile</button>
			</li>
			<li class='nav-item' role='presentation'>
				<button class='nav-link' id='contact-tab' data-bs-toggle='tab' data-bs-target='#contact' type='button' role='tab' aria-controls='contact' aria-selected='false'>Contact</button>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class='tab-content' id='myTabContent'>
			<div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>Eerste</div>
			<div class='tab-pane fade' id='profile' role='tabpanel' aria-labelledby='profile-tab'>Tweede</div>
			<div class='tab-pane fade' id='contact' role='tabpanel' aria-labelledby='contact-tab'>Derde</div>
		</div>
			
		";

	}
}
?>