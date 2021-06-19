<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";

class PhotoView implements iView
{
	/* constructor */

	protected $_id; 
	protected $_url;
	protected $_image;

	protected $_alignment;
	protected $_width;
	protected $_height;
	protected $_subscript;
	protected $_sourceName;

	function __construct(string $json)
	{
		if (empty($json)) 
		{
			throw new exception("Video is mandatory");
		}

		/** create the object */
		$object = json_decode($json);
	
		$this->_id = $object->photoId;
		$this->_url = $object->photoUrl;
		$this->_image = $object->photoImage;

		/** optional values */
		$this->_alignment = (property_exists($object, "alignment") ? $object->alignment : null);
		$this->_width = (property_exists($object, "width") ? $object->width : null);
		$this->_height = (property_exists($object, "height") ? $object->height : null);
		$this->_subscript = (property_exists($object, "subscript") ? $object->subscript : null);
		$this->_sourceUrl = (property_exists($object, "sourceUrl") ? $object->sourceUrl : null);
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