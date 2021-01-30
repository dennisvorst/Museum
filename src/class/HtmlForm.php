<?php

require_once "Html.php";
require_once "HtmlTableRow.php";
require_once "Html.php";

class HtmlForm extends Html
{
	/* constructor */
	function __construct(array $attributes = null){
		parent::__construct("form", $attributes);
	}
}