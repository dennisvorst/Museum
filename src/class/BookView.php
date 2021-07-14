<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iPageView.php";

class BookView implements iPageView
{
    function __construct(array $row)
    {
		if (empty($row) | !isset($row['book']) | !isset($row['book']['id']))
		{
			throw new InvalidArgumentException("Book is mandatory");
		}

		$person = $row['book'];

    }

    function show() : string
    {
        return "Book";
    }

    function showThumbnail() : string
    {
        return "Small Book";
    }
}