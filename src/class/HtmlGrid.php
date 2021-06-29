<?php
class HtmlGrid{
	/* create a grid of div elements based on the number of columns and rows */
	function __construct(){}
	function createGrid(array $collection, int $nrCols){
		/* create a grid of thumbnails in a div like table */

		$html = "";

		if (empty($collection) or empty($nrCols)) {
			return $html;
		}

		/* start the table */
		$html = "<div class='gridtable'>\n";
		/* and the first row */
		$html .= "<div class='row'>\n";

		for ($i=0; $i<count($collection); $i++){
			/* are we at the end of the row */
			if ($i/$nrCols === intval($i/$nrCols) and $i/$nrCols > 0) {
				/* start a new div */
				$html .= "</div>\n";
				$html .= "<div class='row'>\n";
			}
			$html .= "<div class='cell'>" . $collection[$i] . "</div>\n";
		}

		/* close the last row */
		$html .= "</div>\n";
		/* close the table */
		$html .= "</div>\n";

		return $html;
	}
}
?>