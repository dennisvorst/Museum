<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";
require_once "MediaView.php";

class PhotoView extends MediaView implements iView
{
	protected $_id; 
	protected $_url;
	protected $_image;

	protected $_alignment;
	protected $_width;
	protected $_height;
	protected $_subscript;
	protected $_sourceName;

	function __construct(array $row)
	{
		parent::__construct();

		if (empty($row)) 
		{
			throw new exception("Photo is mandatory");
		}

		/** create the object */

//		$article = $row['article'];
//print_r($row);	

		$this->_id = $row['id'];
		$this->_image = $row['image'];
		$this->_url = $this->_getUrl(["option"=>"photos", "id" => $this->_id]);

		/** optional values */
		$this->_alignment = (isset($row['alignment']) ? $row['alignment'] : null);
		$this->_width = (isset($row['width']) ? $row['width'] : null);
		$this->_height = (isset($row['height']) ? $row['height'] : null);
		$this->_subscript = (isset($row['subscript']) ? $row['subscript'] : null);
		$this->_sourceUrl = (isset($row['sourceUrl']) ? $row['sourceUrl'] : null);
	}

	function showThumbnail() : string
	{
		return "
		<div class='card'>
			<div class='container'>
				<div class='row justify-content-center'>
					<a href='{$this->_url}'>{$this->_image}</a>
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
}
?>