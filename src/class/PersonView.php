<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";

class PersonView implements iView
{
	protected $_id; 

	protected $_firstName;
	protected $_surName;
	protected $_lastName;

	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Person is mandatory");
		}

		/** create the object */
		$personArray = json_decode($json, true);

		/** article */
		$person = $personArray['person'];
		$this->_id = $person['id'];
		$this->_firstName 	= $person['firstName'];
		$this->_surName		= (isset($person['surName']) ? $person['surName'] : null);
		$this->_lastName	= $person['lastName'];

		/** photos */
		$this->_photoCollection = (isset($personArray['photos']) ? $personArray['photos'] : []);
	}

	function showThumbnail() : string
	{
		$mugshot = $this->_getMugshot();

		/** show */
		return "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								{$mugshot}
								<figcaption>
									{$this->_getNameWithUrl()}
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
		";
	}

	function show() : string
	{
		return "
		";
	}

	protected function _getNameWithUrl(){
		return "<a href='index.php?option=person&id=". $this->_id . "'>" . $this->_getFullName() . "</a>";
	}

	protected function _getFullName()
	{
		/* get the fullname of the player */
		return $this->_firstName . (!empty($this->_surName) ? " " . $this->_surName : null) . " " . $this->_lastName;
	}

	protected function _getMugshot()
	{
		$html = "<img width='150' height='150' border='0' src='./images/unknown.png'/>";
		foreach ($this->_photoCollection as $photo)
		{
			if ($photo['isMugshot'])
			{
				$html = "<img width='150' height='150' border='0' src='./images/{$photo['id']}.jpg'/>";
			}
		}

		return $html;

	}
}
?>