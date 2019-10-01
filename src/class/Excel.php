<?php
require_once "File.php";

class Excel extends File
{
    /* the file content */
    protected $_content = [];
    function __construct()
    {

    }

    /** getters and setters */
    function getContent() : array
    {
        return $this->_content;
    }
    function setContent(array $content)
    {
        return $this->_content = $content;
    }
}