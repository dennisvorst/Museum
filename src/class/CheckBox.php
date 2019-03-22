<?php
class CheckBox{
	/* constructor */
	function __construct(){
	}

	function getValue($idvalue){
		$nmvalue = "unchecked";
		if ($idvalue == 1 || $idvalue == "Y"){
			$nmvalue = "checked";
		}
		return $nmvalue;
	}
}
