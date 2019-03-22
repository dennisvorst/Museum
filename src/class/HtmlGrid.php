<?php
class HtmlGrid{
	/* create a grid of div elements based on the number of columns and rows */
	function __construct(){}
	function createGrid($ftthumbnails, $nrrows){
		/* create a grid of thumbnails in a div like table */

		$html = "";

		if (empty($ftthumbnails) or empty($nrrows)) {
			return $html;
		}

		/* start the table */
		$html = "<div class='gridtable'>\n";
		/* and the first row */
		$html .= "<div class='row'>\n";

		for ($i=0; $i<count($ftthumbnails); $i++){
			/* are we at the end of the row */
			if ($i/$nrrows === intval($i/$nrrows) and $i/$nrrows > 0) {
				/* start a new div */
				$html .= "</div>\n";
				$html .= "<div class='row'>\n";
			}
			$html .= "<div class='cell'>" . $ftthumbnails[$i] . "</div>\n";
		}

		/* close the last row */
		$html .= "</div>\n";
		/* close the table */
		$html .= "</div>\n";

		return $html;
	}
}
?>