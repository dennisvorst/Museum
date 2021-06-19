<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "iView.php";

class BookView implements iView
{
    function __construct(string $rows)
    {

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