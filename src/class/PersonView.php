<?php
/**
 * Person
 * 	- id
 * 	- articles
 * 	- photos
 * 	- videos - tbd
 * 	- stats
 * 		- hitting
 * 		- pitching
 * 		- fielding
 * 		- hittingtotal
 * 		- pitchingtotal
 * 		- fieldingtotal
 * 		 
 *
 */

/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "PageView.php";
require_once "HtmlTabPage.php";

require_once "HittersView.php";
require_once "PitchersView.php";
require_once "FieldersView.php";

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

	protected $_hallOfFame = [];
	protected $_hallOfFamePhoto = [];
	protected $_hallOfFameDate;
	protected $_hallOfFamePhotoId;

	protected $_fullName;
	protected $_biography;

	protected $_articleCollection = [];
	protected $_photoCollection = [];
	protected $_videoCollection = [];

	protected $_articlesView;
	protected $_photosView;
	protected $_videosView;

	protected $_hittersView;
	protected $_pitchersView;
	protected $_fieldersView;


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
		
		$this->_nickName		= (isset($person['nickName']) ? $person['nickName'] : "");
		$this->_gender			= (isset($person['gender']) ? $person['gender'] : "");
		$this->_birthDate		= (isset($person['birthDate']) ? $person['birthDate'] : "");
		$this->_countryCode		= (isset($person['countryCode']) ? $person['countryCode'] : "");
		$this->_isDead			= (isset($person['isDead']) ? $person['isDead'] : "");
		$this->_biography		= (isset($person['biography']) ? $person['biography'] : "");

		/** hall of fame */
		if (isset($row['hallOfFame']))
		{
			$this->_hallOfFameDate = $row['hallOfFame']['date'];
			if (isset($row['hallOfFame']['photo']))
			{
				$this->_hallOfFamePhoto = $row['hallOfFame']['photo'];
			}
		}

		$this->_fullName = $this->_getFullName();

		/** articles */
		$this->_articlesView = new ArticlesView((isset($row['articles']) ? $row['articles'] : []));

		/** videos */
		$this->_videosView = new VideosView((isset($row['videos']) ? $row['videos'] : []));

		/** photos */
		/** in case of a thumbnail the photoCollection contains only mugshots and in case of show it contains all photos */
		$this->_photosView = new PhotosView((isset($row['photos']) ? $row['photos'] : []));
		
		/** get the mugshot */
		$this->_getMugshotPhoto($this->_hallOfFamePhoto, $this->_photoCollection);

		/** stats */
		if (isset($row['stats']))
		{
			$this->_hittersView = new HittersView((isset($row['stats']['hitting']) ? $row['stats']['hitting'] : []));
			$this->_pitchersView = new PitchersView((isset($row['stats']['pitching']) ? $row['stats']['pitching'] : []));
			$this->_fieldersView = new FieldersView((isset($row['stats']['fielding']) ? $row['stats']['fielding'] : []));
		}
	}

	function showThumbnail() : string
	{
		/** prepare */
		$image = (empty($this->_mugshotPhoto) ? "" : $this->_mugshotPhoto->showThumbnailPhoto($this->_fullName));
		
		/** show */
		return "
		<div class='card'>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<div align='center'>
							<figure>
								{$image}
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

		/** create the tabs  */
		$tabs = $this->_showTabs();

		/** show */
		return "
		<div class='container'>
			<div class='row'>
				<h1>{$this->_fullName}</h1>
			</div>
			<!-- hallOfFameText -->
			{$hallOfFameText}
			<!-- photoAndText -->
			{$photoAndText}
			{$tabs}
		</div>
		";
	}


	function showHofThumbnail()
	{
		/* todo connect to mediaview */
		$image = (empty($this->_mugshotPhoto) ? "" : $this->_mugshotPhoto->showThumbnailPhoto($this->_fullName));
		$href = $this->_getUrl(["option" => "person", "id" => $this->_id]);

		return "
		<div class='card' style='width: 18rem;'>
			{$image}
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
		$mugshot = (empty($this->_mugshotPhoto) ? "" : $this->_mugshotPhoto->showPhoto($this->_fullName));

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


	function _getMugshotPhoto(array $hallOfFamePhoto, array $photoCollection) : void
	{
		/** mugshot is either the HOF photo or a mugshot from the photolist or nothing */

		if (!empty($hallOfFamePhoto)){
			$this->_mugshotPhoto = new PhotoView($hallOfFamePhoto);
			return;
		} else {
			foreach ($photoCollection as $photo)
			{
				if ($photo->isMugshot())
				{
					$this->_mugshotPhoto = $photo;
					return;
				}
			}
		}
	}


	protected function _showTabs() : string
	{
		$tabs = [];
		$content = [];

		$tab = new HtmlTabPage();

		/** articles */
		if (!empty($this->_articlesView) & $this->_articlesView->count() > 0) 
		{
			$tab->add(new HtmlTabElement("artikelen", "Artikelen", $this->_articlesView->showPersonalArticles(), true));
		}

		/** photos */
		if (!empty($this->_photosView) & $this->_photosView->count() > 0) 
		{
			$tab->add(new HtmlTabElement("photos", "Foto's", $this->_photosView->showPersonalPhotos(), false));
		}

		/** videos */
		if (!empty($this->_videosView) & $this->_videosView->count() > 0) 
		{
			$tab->add(new HtmlTabElement("videos", "Video's", $this->_videosView->showPersonalVideos(), false));
		}

		/** stats */
		$html = "";
		if (!is_null($this->_hittersView)) 
		{
			$html .= ($this->_hittersView->count() > 0 ? $this->_hittersView->showPersonalStats() : "");
		}
		if (!is_null($this->_pitchersView)) 
		{
			$html .= ($this->_pitchersView->count() > 0 ? $this->_pitchersView->showPersonalStats() : "");
		}
		if (!is_null($this->_fieldersView)) 
		{
			$html .= ($this->_fieldersView->count() > 0 ? $this->_fieldersView->showPersonalStats() : "");
		}
		if (!empty($html))
		{
			$tab->add(new HtmlTabElement("stats", "Statistieken", $html, false));
		}

		return $tab->show();
	}
}
?>