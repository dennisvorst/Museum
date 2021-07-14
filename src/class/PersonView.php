<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "PageView.php";

class PersonView extends PageView implements iPageView
{
	protected $_id; 

	protected $_firstName;
	protected $_surName;
	protected $_lastName;

	protected $_nickName;
	protected $_gender;
	protected $_birthDate;
	protected $_countryCode;
	protected $_isDead;

	protected $_mugshotPhoto;
	protected $_hallOfFamePhoto;
	protected $_hallOfFameDate;
	protected $_hallOfFamePhotoId;

	protected $_fullName;
	protected $_biography;

	protected $_articleCollection = [];
	protected $_photoCollection = [];
	protected $_videoCollection = [];

	function __construct(array $row)
	{
		if (empty($row) | !isset($row['person']) | !isset($row['person']['id']))
		{
			throw new InvalidArgumentException("Person is mandatory");
		}

		$person = $row['person'];


		/** person */
		$this->_id = $person['id'];
		$this->_firstName 	= $person['firstName'];
		$this->_surName		= (isset($person['surName']) ? $person['surName'] : null);
		$this->_lastName	= $person['lastName'];
		
		$this->_hallOfFameDate	= (isset($person['halloffamedate']) ? $person['halloffamedate'] : "");
		$this->_nickName		= (isset($person['nickName']) ? $person['nickName'] : "");
		$this->_gender			= (isset($person['gender']) ? $person['gender'] : "");
		$this->_birthDate		= (isset($person['birthDate']) ? $person['birthDate'] : "");
		$this->_countryCode		= (isset($person['countryCode']) ? $person['countryCode'] : "");
		$this->_isDead			= (isset($person['isDead']) ? $person['isDead'] : "");
		$this->_biography		= (isset($person['biography']) ? $person['biography'] : "");

		$this->_hallOfFamePhoto = (isset($person['hallOfFamePhoto']) ? $person['hallOfFamePhoto'] : []);

		$this->_fullName = $this->_getFullName();

		/** articles */
		$this->_articleCollection = (isset($row['articles']) ? $row['articles'] : []);		
		/** videos */
		$this->_videoCollection = (isset($row['videos']) ? $row['videos'] : []);
		/** photos */
//		$this->_photoCollection = (isset($row['photos']) ? $this->_getPhotoCollection($row['photos']) : []);
		$this->_photoCollection = (isset($row['photos']) ? $row['photos'] : []);		

		/** get the mugshot */
		$this->_getMugshot($this->_hallOfFamePhoto, $this->_photoCollection);
	}

	function showThumbnail() : string
	{
		/** prepare */
		$picture = "TBD"; // $this->_getPicture(true);
		
		/** show */
		return "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								{$picture}
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
		/** prepare */
		$hallOfFameText = $this->_getHallOfFameText($this->_getHofDate());
		$photoAndText = $this->_getPhotoAndText();

		/** show */
		return "
		<div class='container'>
			<div class='row'>
				<h1>{$this->_fullName}</h1>
			</div>
			{$hallOfFameText}
			{$photoAndText}
		</div>
		";
	}


	function showHofThumbnail()
	{
		/* todo connect to mediaview */

		//"./images/thumbnails/{$this->_hallOfFamePhoto}.jpg";
//		$src = (empty($this->_hallOfFamePhoto) ? "" : $this->_hallOfFamePhoto->getSource(true));
		$href = $this->_getUrl(["option" => "person", "id" => $this->_id]);

		return "
		<div class='card' style='width: 18rem;'>
			<img class='card-img-top' src='{$src}' alt='{$this->_fullName}'>
			<div class='card-body'>
				<h5 class='card-title'><a href='{$href}'>{$this->_fullName}</a></h5>
				<p class='card-text'>{$this->_biography}</p>
			</div>
	  	</div>"; 

		return $html;
	}


	function _getHofDate() : string 
	{
		return (empty($this->_hallOfFameDate) ? "" : $this->_hallOfFameDate);
	}


	protected function _getNameWithUrl(){
		return "<a href='index.php?option=person&id=". $this->_id . "'>" . $this->_getFullName() . "</a>";
	}


	protected function _getFullName()
	{
		/* get the fullname of the player */
		return $this->_firstName . (!empty($this->_surName) ? " " . $this->_surName : null) . " " . $this->_lastName;
	}


	protected function _isInHallOfFame() : bool
	{
		if ($this->_hallOfFameDate) 
		{
			return true;
		} else {
			return false;
		}
	}


	private function _getHallOfFameText(string $dthof) : string
	{
		if ($this->_isInHallOffame()) 
		{
			$date = new Date();
			$dthof = $date->translateDate($dthof, "D");
			return "<i class='fas fa-star'></i> in de eregalerij sinds {$dthof}";
		}
		return "";
	}

	protected function _getPhotoAndText()
	{
		/** mugshot is a photoView */
		$mugshot = (empty($this->_mugshotPhoto) ? "" : $this->_mugshotPhoto->show());

		if (!empty($this->_biography) && !empty($mugshot)) 
		{
			return "
			<div class='row'>
				<div class='col'>
					{$mugshot}
				</div>			
				<div class='col'>
					{$this->_biography}
				</div>			
			</div>
			";
		}
		elseif (empty($this->_biography))
		{
			/** show only photo */
			return "
			<div class='row'>
				<!-- mugshot -->
				{$mugshot}
			</div>
			";
		}
		elseif (empty($mugshot))
		{
			/** show only biography */
			return "
			<div class='row'>
				<!-- bio -->
				{$this->_biography}
			</div>
			";
		}
		else 
		{
			/** show nothing */
			return "";
		}
	}


	function _getMugshot(array $hallOfFamePhoto, array $photoCollection) : void
	{
		/** mugshot is either the HOF photo or a mugshot from the photolist or nothing */

		if (!empty($hallOfFamePhoto))
		{
			$this->_mugshotPhoto = new PhotoView($hallOfFamePhoto);
		} 
		else 
		{
			foreach ($photoCollection as $row)
			{
				if (isset($row['isMugshot']) && $row['isMugshot'] === "J")
				{
					$this->_mugshotPhoto = new PhotoView($row);
					return;
				}
			}
		}
	}


	/** collections */
	protected function _showArticles() : string
	{
		/** prepare */
		$articles = [];
		foreach ($this->_articleCollection as $article)
		{
			$article = new ArticleView($article);
			$articles[] = $article->getThumbnail();
		}

		/** create */
		$html = "";
		
		return $html;
	}

	/** turn all the photoarrays into objects and get the mugshot and the hall of fame photo as well */
	protected function _getPhotoCollection(array $photos) : array
	{
		if (empty($this->_photoCollection)) 
		{
			$this->_photoCollection = [];
			foreach ($photos as $photo)
			{
				$photo = new PhotoView($photo);
				$this->_photoCollection[] = $photo;
			}
		}
		return $this->_photoCollection;
	}


	protected function _showPhotos() : string
	{
		/** prepare */
		/** keep in mind that we already created objects from the array in the construct */
		$photos = [];
		foreach ($this->_photoCollection as $photo)
		{
			$photos[] = $photo->getThumbnail();
		}

		/** create */
		$html = "";
		return $html;
	}

	protected function _showVideos() : string
	{
		/** prepare */
		$videos = [];
		foreach ($this->_videoCollection as $video)
		{
			$video = new VideoView($video);
			$videos[] = $video->getThumbnail();
		}

		/** create */
		$html = "";
		return $html;
	}

	protected function _showStatistics() : string
	{
		/** prepare */

		/** create */
		$html = "";
		return $html;
	}
}
?>