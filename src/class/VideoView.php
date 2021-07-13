<?php
require_once "iPageView.php";
require_once "PageView.php";

class VideoView extends PageView implements iPageView
{
	protected $_id;
	protected $_name;

	function __construct(array $row)
	{
		if (empty($row)) 
		{
			throw new InvalidArgumentException("Video is mandatory");
		}

		/** create the object */
		$this->_id = $row['id'];
		$this->_name = $row['name'];
		$this->_url= $row['url'];
	}


	/** used for the photos */
	function showThumbnail() : string
	{
		$photoUrl = $this->_getVideoPhoto($this->_url);
		$url = $this->_getUrl(["option" => "video", "id" => $this->_id]);

		// <div class='col-xs-3'>
		// 	<div align='center'>
		// 		<a href='index.php?id=1064&nmclass=person'><img width='150' height='150' border='0' src='./images/unknown.png'/></a>
		// 		<a href='index.php?id=1064&nmclass=person'>Loek Loevendie</a>
		// 	</div>
		// </div>

		/** collect */

		/** create */
		return "
		<div class='card'>
			<div class='container'>
				<div class='row justify-content-center'>
					<figure>
						<figcaption>
							<h4><a href='{$url}'>{$this->_name}</a></h4>
						</figcaption>
						<a href='index.php?id={$this->_id}&option=video'>
							<img width='200' src='{$photoUrl}'>
						</a>
					</figure>
				</div>
			</div>
		</div>";
	}

	/** used for the articles */
	function show() : string
	{
		/** collect */
		$url = $this->_getVideoUrl($this->_url);

		/* get the video */
		// return "
		// <div class='container'>
		// 	<div class='row'>
		// 		<h1>{$this->_name}</h1>
		// 	</div>
		// 	<div class='row'>
		// 		<iframe width='420' height='315' src='{$this->_url}' frameborder='0' allowfullscreen></iframe>
		// 	</div>
		// </div>
		// ";

		return "
		<div class='container'>
			<div class='row'>
				<h1>{$this->_name}</h1>
			</div>
			<div class='row'>
				<iframe id='ytplayer' type='text/html' width='640' height='360' src='{$url}' frameborder='0'></iframe>
			</div>
		</div>
		";
	}

	protected function _getVideoPhoto(string $nmurl){
		return "https://img.youtube.com/vi/{$nmurl}/0.jpg";
	}

	protected function _getVideoUrl(string $nmurl){
		return "https://www.youtube.com/embed/{$nmurl}?autoplay=1&origin=https://www.honkbalmuseum.nl";
	}

}
?>