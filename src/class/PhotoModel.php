<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iModel.php";

class PhotoModel implements iModel{

	protected $_id;
	protected $_idsource;
	protected $_nmphotographer;
	protected $_nrorder;
	protected $_nryear;
	protected $_dtpublish;
	protected $_idoriginal;
	protected $_idmugshot;
	protected $_idaction;
	protected $_idteamphoto;
	protected $_ftdepicted;
	protected $_ftdescription;
	protected $_is_featured;

	function __construct(array $row)
	{
		$this->_id				= $row['idphoto'];
		$this->_idsource		= $row['idsource'];
		$this->_nmphotographer	= $row['nmphotographer'];
		$this->_nrorder			= $row['nrorder'];
		$this->_nryear			= $row['nryear'];
		$this->_dtpublish		= $row['dtpublish'];
		$this->_idoriginal		= $row['idoriginal'];
		$this->_idmugshot		= $row['idmugshot'];
		$this->_idaction		= $row['idaction'];
		$this->_idteamphoto		= $row['idteamphoto'];
		$this->_ftdepicted		= $row['ftdepicted'];
		$this->_ftdescription	= $row['ftdescription'];
		$this->_is_featured		= $row['is_featured'];

	}
    function getThumbnailData() : string
	{
		$json['photoId']	= $this->_id;
		$json['photoUrl']	= $this->getUrl(["option"=>"photos", "id" => $this->_id]);
		$json['photoImage'] = $this->getThumbnail();

		return json_encode($json);
		$colspan = 2;
		$photoThumbnail = "";
		if (!empty($photo)){
			$colspan = 3;
			$photoThumbnail = "
				<div class='col-sm-3'>
					{$photo}
				</div>";
		}



	}

	function getPageData() : string
	{

	}

	protected function _getUrl(array $items)
	{
		/* create the url */
		$keys = array_keys($items);
		$url = "";

		foreach ($keys as $key)
		{
			if (empty($url)){
				$url = $key . "=" . $items[$key];
			} else {
				if (!empty($key) && !empty($items[$key]))
				{
					$url = $url . "&" . $key . "=" . $items[$key];
				}
			}
		}
		return $url;
	}
}
?>