<?php
require_once "Country.php";
require_once "Source.php";

class HtmlSelect{

	/* constructor */
	function __construct(){
	}

	function getClass($nmfield, $idvalue){
		$ftlist = array("HB" => "Honkbal", "SB" => "Softball");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getSport($nmfield, $idvalue){
		$ftlist = array("SEN" => "Senioren", "JUN" => "Junioren", "ASP" => "Aspiranten", "PUP" => "Pupillen", "PEA" => "Peanuts", "BEE" => "BeeBall");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getLanguage($nmfield, $idvalue){
		$ftlist = array("NL" => "Nederlands", "EN" => "Engels", "IT" => "Italiaans");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}


	function getDexterity($nmfield, $idvalue){
		/* left-handed, right-handed or both (switch) */
		/* default is right handed */
		if (empty($idvalue)){
			$idvalue = "U";
		}
		$ftlist = array("U" => "Onbekend", "R" => "Rechts", "L" => "Links", "S" => "Switch");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getGender($nmfield, $idvalue){
		/* Male, Female */
		/* default is male */
		if (empty($idvalue)){
			$idvalue = "M";
		}
		$ftlist = array("M" => "Heren", "F" => "Dames");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getSex($nmfield, $idvalue){
		/* Male, Female */
		/* default is male */
		if (empty($idvalue)){
			$idvalue = "M";
		}
		$ftlist = array("M" => "Man", "F" => "Vrouw");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getStatus($nmfield, $idvalue){
		/* Actief, Niet actief */
		/* default is N */
		if (empty($idvalue)){
			$idvalue = "N";
		}
		$ftlist = array("N" => "Niet Actief", "A" => "Actief");
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}

	function getAllSources($nmfield, $idvalue){
		/*create a dropdown list of all sources */
		$source = new Source();
		$ftlist = $source->getAllSources();
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}//getAllSources

	function getVerifiedSources($nmfield, $idvalue){
		/*create a list of all verified sources */
		$source = new Source();
		$ftlist = $source->getVerifiedSources();
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}//getVerifiedSources

	function getCountries($nmfield, $idvalue){
		/*create a dropdown list of all countries */
		$countries = new Country();
		$ftlist = $countries->getCountries();
		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}//getAllSources

	function getNumericList($nmfield, $idvalue, $nrstart, $nrend){
		/*create a dropdown list of all numeric values */

		/* create an array of numeric values */
		$ftlist = array();
		while ($nrstart <= $nrend ){
			$ftlist[$nrstart] = $nrstart;
			$nrstart++;
		}

		return HtmlSelect::getHTMLSelect($nmfield, $idvalue, $ftlist);
	}//getAllSources



	function getHTMLSelect($nmfield, $idvalue, $ftlist){
		$keys = array_keys($ftlist);

		$htmlElement = "<select name='" . $nmfield .  "' id='select' class='form-control'>\n";
		foreach ($keys as $key){
			if ($key == $idvalue){
				$htmlElement .= "	<option value='" . $key . "' selected>" . $ftlist[$key] . "</option>\n";

			} else {
				$htmlElement .= "	<option value='" . $key . "'>" . $ftlist[$key] . "</option>\n";
			}
		}
		$htmlElement .= "</select>";
		return $htmlElement;
	}//getHTMLSelect

}
?>