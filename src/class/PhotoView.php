<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";
require_once "MediaView.php";

class PhotoView extends MediaView implements iPageView
{
	protected $_id; 
	protected $_url;
	protected $_image;

	protected $_alignment;
	protected $_width;
	protected $_height;
	protected $_subscript;
	protected $_sourceName;

	protected $_isMugshot;


	function __construct(array $row)
	{
		parent::__construct();

		if (empty($row) | !isset($row['photo']) | !isset($row['photo']['id']))
		{
			throw new InvalidArgumentException("Photo is mandatory");
		}
		$photo = $row['photo'];

		/** mandatory values */
		$this->_id = $photo['id'];

		/** optional values */
		$this->_alignment = (isset($photo['alignment']) ? $photo['alignment'] : null);
		$this->_subscript = (isset($photo['subscript']) ? $photo['subscript'] : null);
		$this->_sourceUrl = (isset($photo['sourceUrl']) ? $photo['sourceUrl'] : null);

		/** cast the array value to a bool value */
		$this->_isMugshot = (isset($photo['isMugshot']) ?  (bool)($photo['isMugshot']) : False);

		/** calculated values */
		$this->_image = $this->_id . ".jpg";
		$this->_url = $this->_getUrl(["option"=>"photo", "id" => $this->_id]);
	}


	function showThumbnail() : string
	{
		/** collect */
		$photo = $this->showThumbnailPhoto($this->_subscript);

		/** create */
		return "
		<div class='card' style='width: 10rem;height: 15rem;'>
			<div class='container'>
				<div class='row justify-content-center'>
					<a href='{$this->_url}'>
						{$photo}
					</a>
				</div>			
			</div>
		</div>
		";		
	}


	function show() : string
	{
		/** collect */
		$photo = $this->showPhoto($this->_subscript);

		/** create */
		return "
		<div class='container photo photo-{$this->_alignment}'>
			<div class='image'>
				{$photo}
			</div>
			<div class='subscript'>
				{$this->_subscript} <b>(Foto: {$this->_sourceUrl})</b>
			</div>
		</div>
		";
	}


	function isMugshot() : bool
	{
		return $this->_isMugshot;
	}


	function showPhoto(string $alt = null) : string
	{
		$image = $this->_path . $this->_image;
		if (!empty($alt))
		{
			$alt = " alt='{$alt}'";
		}

//		$this->_getImageSize($image, 150);
//		return "<img src='{$image}' class='rounded'{$this->_width}{$this->_height} alt='{$alt}'>";
		return "<img src='{$image}' class='rounded'{$alt}>";
	}


	function showThumbnailPhoto(string $alt = null) : string
	{
		/** collect */
		$limit = 65;
		if (!empty($alt))
		{
			$alt = (strlen($alt) > $limit ? substr($alt, 0, $limit) : $alt);
			$alt = " alt='{$alt}'";
		}
		$image = $this->_thumbnailPath . $this->_image;
//		$imageSize = $this->_getimagesize($image, 150);
//		return "<img src='{$image}' class='rounded'{$this->_width}{$this->_height} alt='{$alt}'>";

		/** create */
		return "<img src='{$image}' class='rounded'{$alt}>";
	}

	// /** 
	//  * A file is either portrait or landscape and we show max 150 pixels for thumbnails and 300 pixels for photos.
	//  */
	// protected function _getImageSize(string $image, int $max) : void
	// {
	// 	$this->_width = "";
	// 	$this->_height = "";
	// 	if (file_exists($image)) 
	// 	{
	// 		$imageSize = getimagesize($image);

	// 		$this->_width  = $imageSize[0];
	// 		$this->_height = $imageSize[1];

	// 		if ($this->_width > $this->_height)
	// 		{
	// 			/** landscape */
	// 			if ($this->_width > $max)
	// 			{
	// 				$this->_height = $this->_height * ($max / $this->_width);
	// 				$this->_height = round($this->_height, 0);
	// 				$this->_width = $max; //600
	// 			} else {
	// 				$this->_height = $height;
	// 				$this->_width = $width;
	// 			}
	// 		} else {
	// 			/** portrait */
	// 			if ($this->_height > $max)
	// 			{
	// 				$this->_width = $this->_width * ($max / $this->_height);
	// 				$this->_width = round($this->_width, 0);
	// 				$this->_height = $max;
	// 			} else {
	// 				$this->_height = $height;
	// 				$this->_width = $height;
	// 			}
	// 		}
	// 		$this->_width = " width='{$this->_width}'";
	// 		$this->_height = " height='{$this->_height}'";
	// 	}
	// }
}
?>