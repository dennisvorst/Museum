<?php
/* include section */
//require_once('Log.php');
//require_once('MysqlConfig.php');
//require_once('MysqlDatabase.php');

class Country extends MysqlDatabase{

	/* constructor */
	function __construct(){
		parent::__construct();
	}

	function getCountries(){
		/* get a list of countries */
		$query	= "SELECT cdcountry, nmcountry FROM countries ORDER BY nmcountry";
		$result	= $this->_db->select($query);

		foreach ($result as $country){
			$countries[$country['cdcountry']] = $country['nmcountry'];
		}
		return $countries;

	}// getCountries

}
?>