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
	protected $_isMugshot = false;
	protected $_isActionphoto = false;
	protected $_isTeamphoto = false;
	protected $_ftdepicted;
	protected $_ftdescription;
	protected $_isFeatured = false;

	function __construct(MysqlDatabase $db, Log $log, int $id)
	{
		$this->_id				= $id;

		$this->_id				= $row['idphoto'];
		$this->_idsource		= $row['idsource'];
		$this->_nmphotographer	= $row['nmphotographer'];
		$this->_nrorder			= $row['nrorder'];
		$this->_nryear			= $row['nryear'];
		$this->_dtpublish		= $row['dtpublish'];
		$this->_idoriginal		= $row['idoriginal'];
		$this->_isMugshot		= ($row['idmugshot'] = "J" ? true : false);
		$this->_isActionphoto	= ($row['idaction'] = "J" ? true : false);
		$this->_isTeamphoto		= ($row['idteamphoto'] = "J" ? true : false);
		$this->_ftdepicted		= $row['ftdepicted'];
		$this->_ftdescription	= $row['ftdescription'];
		$this->_isFeatured		= ($row['is_featured'] = "J" ? true : false);

	}

	function getThumbnailData() : string
	{
		return json_encode($this->getData());
	}

	function getPageData() : string
	{
		return json_encode($this->getData());
	}


	function getData() : array
	{
		$json['id']	= $this->_id;
//		$json['url']	= $this->_getUrl(["option"=>"photos", "id" => $this->_id]);
		$json['image'] = $this->_id . ".jpg";
		$json['subscript'] = $this->_ftdescription;
		$json['isMugshot'] = $this->_ftdescription;

		$json['source']['id'] = $this->_idsource;
		return $json;
	}
}
?>