<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class VideoView{
	/* constructor */
	protected $_id;
	protected $_videoUrl;
	protected $_videoName;
	
	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Video is mandatory");
		}

		/** create the object */
		$object = json_decode($json);

		$this->_id = $object->videoId;
		$this->_videoUrl = $object->videoUrl;
		$this->_videoName = $object->videoName;
		
	}

	function showThumbnail()
	{
		/** create */
		return "
		<div class='card'>
			<div class='container'>
				<div class='row justify-content-center'>
					<figure>
						<figcaption>
							<h4><a href='index.php?id={$this->_id}&option=video'>{$this->_videoName}</a></h4>
						</figcaption>
						<a href='index.php?id={$this->_id}&option=video'>
							<img width='200' src='{$this->_videoUrl}'>
						</a>
					</figure>
				</div>
			</div>
		</div>";

	}

	function show()
	{
		/* get the video */
		return "
		<div class='container'>
			<div class='row'>
				<h1>{$this->_videoName}</h1>
			</div>
			<div class='row'>
				<iframe width='420' height='315' src='{$this->_videoUrl}' frameborder='0' allowfullscreen></iframe>
			</div>
		</div>
		";
	}
}
?>