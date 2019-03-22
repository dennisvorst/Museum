<?php
/* include section */
require_once "Database.php";

class Country extends Database{

	/* constructor */
	function __construct(){
		parent::__construct();
	}

	function getCountries(){
		/* get a list of countries */
		$query	= "SELECT cdalpha2, nmcountry FROM countries ORDER BY nmcountry";
		$result	= $this->queryDb($query);

		foreach ($result as $country){
			$countries[$country['cdalpha2']] = $country['nmcountry'];
		}
		return $countries;

	}// getCountries

}
?>