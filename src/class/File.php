<?php
class File
{
    protected $_uploadFolder = "../upload/";
    protected $_downloadFolder = "../download/";

    function __construct(string $filename)
    {

    }

    function getDownloadFolder()
    {
        return $this->_downloadFolder;
    }
    function getUploadFolder()
    {
        return $this->_uploadFolder;
    }
    
}