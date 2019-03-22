<?php
class HtmlField{

	/* constructor */
	function __construct(){
	}

	function createField($name, $type = null, $ftvalue = null){
//		print_r("HtmlField::createField");
		/* deprecated use MysqlField::createField instead */
		if ($type === "checkbox") {
			if(!empty($ftvalue)){
				if ($ftvalue === "1") {
					$ftvalue = " checked";
				}
			}
			if ($ftvalue !== "checked") {
//				$ftvalue = " unchecked";
				$ftvalue = null;
			}

		} else {
			if(!empty($ftvalue)){
				$ftvalue = " value=\"$ftvalue\"";
			}
		}

		if(!empty($type)){
			$type = " type=\"$type\"";
		}

		return "<input" . $type . " name=\"$name\"" . $ftvalue . ">";

	}

	function columnToField($ftfield){
		/* turn the mySql column into a field */

		return "<input" . $type . " name=\"" . $ftFieldlist['Field'] . "\"" . $ftvalue . ">";

	}

}
?>