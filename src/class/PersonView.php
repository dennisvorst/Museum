<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "View.php";

class PersonView extends View implements iView
{
	protected $_id; 

	protected $_firstName;
	protected $_surName;
	protected $_lastName;

	protected $_articleCollection = [];
	protected $_photoCollection = [];
	
	function __construct(array $row)
	{
		if (empty($row)) 
		{
			throw new exception("Person is mandatory");
		}

		/** person */
		$this->_id = $row['id'];
		$this->_firstName 	= $row['firstName'];
		$this->_surName		= (isset($row['surName']) ? $row['surName'] : null);
		$this->_lastName	= $row['lastName'];

		/** photos */
		$this->_articleCollection = (isset($row['articles']) ? $row['articles'] : []);		
		$this->_videoCollection = (isset($row['videos']) ? $row['videos'] : []);
		$this->_photoCollection = (isset($row['photos']) ? $row['photos'] : []);		
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
		/** prepare */
		$fullName = $this->getFullName();
		$hofDate = $this->_isHof($this->getHofDate());

		$articles = $this->_showArticles();
		$this->_photosCollection		= $this->_getPersonCollection($this->_id);
		$this->_videoCollection			= $this->_getVideoCollection($this->_id);
		$this->_statisticsCollection	= $this->_getStatisticsCollection($this->_id);
		$this->_teamCollection 			= $this->_getTeamCollection($this->_id);


		/** show */
		return "
		<div class='container'>
			<div class='row'>
				<h1>{$fullName}</h1>
			</div>
		</div>

		
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
				break;
			}
		}
		return $html;
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

	protected function _showPhotos() : string
	{
		/** prepare */
		$photos = [];
		foreach ($this->_photoCollection as $photo)
		{
			$photo = new PhotoView($photo);
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