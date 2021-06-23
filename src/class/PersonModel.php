<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

//*********************************************************
// *** Include Section
//*********************************************************
require_once "iModel.php";

class PersonModel implements iModel{

	protected $_id;

	protected $_firstName;
	protected $_surName;
	protected $_lastName;
	
	protected $_photoCollection = [];

	function __construct(array $row)
	{
		$this->_id			= $row['idperson'];

		$this->_firstName	= $row['nmfirst'];
		$this->_surName		= $row['nmsur'];
		$this->_lastName	= $row['nmlast'];

		// $this->_nmnick 		= $this->ftrecord['nmnick'];
		// $this->_cdgender		= $this->ftrecord['cdgender'];
		// $this->_dtbirth 		= $this->ftrecord['dtbirth'];
		// $this->_nmbirthplace = $this->ftrecord['nmbirthplace'];
		// $this->_cdcountry 	= $this->ftrecord['cdcountry'];
		// $this->_dtdeath 		= $this->ftrecord['dtdeath'];
		// $this->_nmdeathplace = $this->ftrecord['nmdeathplace'];
		// $this->_nmaddress 	= $this->ftrecord['nmaddress'];
		// $this->_nmpostal 	= $this->ftrecord['nmpostal'];
		// $this->_nmcity 		= $this->ftrecord['nmcity'];
		// $this->_ftphone 		= $this->ftrecord['ftphone'];
		// $this->_ftcell 		= $this->ftrecord['ftcell'];
		// $this->_ftemail 		= $this->ftrecord['ftemail'];
		// $this->_cdthrows 	= $this->ftrecord['cdthrows'];
		// $this->_cdbats 		= $this->ftrecord['cdbats'];
		// $this->_cdsubscr 	= $this->ftrecord['cdsubscr'];
		// $this->_dtsend 		= $this->ftrecord['dtsend'];
		// $this->_nmclubstart 	= $this->ftrecord['nmclubstart'];
		// $this->_dthof 		= $this->ftrecord['dthof'];
		// $this->_idphotohof 	= $this->ftrecord['idphotohof'];
		// $this->_ftbiography 	= $this->ftrecord['ftbiography'];
		// $this->_is_featured 	= $this->ftrecord['is_featured'];

		//		$this->_nmfull 		= $this->ftrecord['nmfull'];

	}

	function getDataArray() : array
	{
		$json = [];

		$json['person']['id']			= $this->_id;
		$json['person']['firstName']	= $this->_firstName;
		$json['person']['surName']		= $this->_surName;
		$json['person']['lastName']		= $this->_lastName;

		$json['photos'] = $this->_getPersonPhotos();

		return $json;
	}

	protected function _getPersonPhotos() : array
	{
		if (empty($this->_photoCollection))
		{
			$this->_photoCollection = [];
		}
		return $this->_photoCollection;
	}
}
?>