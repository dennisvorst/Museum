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

		if (empty($row)) 
		{
			throw new InvalidArgumentException("Photo is mandatory");
		}

		/** mandatory values */
		$this->_id = $row['id'];

		/** optional values */
		$this->_alignment = (isset($row['alignment']) ? $row['alignment'] : null);
		$this->_width = (isset($row['width']) ? $row['width'] : null);
		$this->_height = (isset($row['height']) ? $row['height'] : null);
		$this->_subscript = (isset($row['subscript']) ? $row['subscript'] : null);
		$this->_sourceUrl = (isset($row['sourceUrl']) ? $row['sourceUrl'] : null);

		$this->_isMugshot = (isset($row['isMugshot']) ? $row['isMugshot'] : false);

		/** calculated values */
		$this->_image = $this->_id . ".jpg";
		$this->_url = $this->_getUrl(["option"=>"photo", "id" => $this->_id]);
	}


	function showThumbnail() : string
	{
		$image = $this->getsource();
		return "
		<div class='card'>
			<div class='container'>
				<div class='text-center'>
					<a href='{$this->_url}'>
						<img src='{$image}' class='rounded' alt='{$this->_subscript}'>
					</a>
				</div>			
				<div class='row justify-content-center'>
						<img border='0' src=>
				</div>
			</div>
		</div>
		";		
	}


	function show() : string
	{
		return "
		<div class='container photo photo-{$this->_alignment}'>
			<div class='image'>
				<img src='{$this->_url}' width='{$this->_width}' height='{$this->_height}'>
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


	function getSource(bool $forThumbnail = false) : string
	{
		if ($forThumbnail) 
		{
			return $this->_thumbnailPath . $this->_image;
		}
		else 
		{
			return $this->_path . $this->_image;
		}
	}
}
?>