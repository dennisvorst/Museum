<?php 
require_once "CheckResult.php";

class CheckPhotos
{
    protected $_result;
    protected $_db;
    protected $_photoPath = "../../db/images/photos";
    protected $_thumbnailPath = "../../db/images/thumbnails";

    protected $_photos = [];
    protected $_thumbs = [];

    protected $_photoRecords = [];

    function __construct(MysqlDatabase $db)
    {
        $this->_result = new CheckResult();
        $this->_db = $db;

        $this->_photos = scandir($this->_photoPath);
        $this->_thumbs = scandir($this->_thumbnailPath);

        
        $sql = "SELECT idphoto as id FROM photos ORDER BY idphoto";
        $this->_photoRecords = $this->_db->select($sql);
    }

    function show() : string
    {
        $html = "";
        $html .= $this->showRecordsWhithoutPhotoFiles();
        $html .= $this->showPhotofilesWithoutRecords();
        $html .= $this->showPhotofilesWithoutThumbnailFiles();
        $html .= $this->showThumbnailfilesWithoutPhotoFiles();
        $html .= $this->showRecordsWhithoutThumbnailFiles();
        $html .= $this->showThumbnailFilesWithoutRecords();
        return $html;
    }

    function showRecordsWhithoutPhotoFiles() : string
    {
        /** init */
        $rows = [];
        foreach ($this->_photoRecords as $photo)
        {
            if (!file_exists($this->_photoPath . "/" . $photo['id'] . ".jpg"))
            {
                $rows[] = $photo;
            }
        }

        /** show */
        $title = "Records that have no corresponding photo";

        $rows = [];
        return $this->_result->show($title, $rows);
    }

    function showPhotofilesWithoutRecords() : string
    {
        // Photos that have no corresponding record
        $rows = $this->_matchRecords($this->_photos);

        $title = "Photos that have no corresponding record";
        return $this->_result->show($title, $rows);
    }

    function showThumbnailFilesWithoutRecords() : string
    {
        // Thumbnails without records
        $title = "Thumbnails without records";


        $rows = $this->_matchRecords($this->_thumbs);

        return $this->_result->show($title, $rows);
    }

    function showPhotofilesWithoutThumbnailFiles() : string
    {
        // Photos that donot have thumbnails
        $title = "Photos that donot have thumbnails";
        $rows = array_diff($this->_photos, $this->_thumbs);

        return $this->_result->show($title, $rows);
    }

    function showThumbnailfilesWithoutPhotoFiles() : string
    {
        // Thumbnails that donot have photos
        $title = "Thumbnails that donot have photos";
        $rows = array_diff($this->_photos, $this->_thumbs);

        return $this->_result->show($title, $rows);
    }

//tbd
    function showRecordsWhithoutThumbnailFiles() : string
    {
        //Records that have no corresponding thumbnail 
        $title = "Records that have no corresponding thumbnail";

        $rows = [];
        foreach ($this->_photoRecords as $photo)
        {
            if (!file_exists($this->_thumbnailPath . "/" . $photo['id'] . ".jpg"))
            {
                $rows[] = $photo;
            }
        }

        /** show */
        $title = "Records that have no corresponding photo";
        return $this->_result->show($title, $rows);
    }


    protected function _matchRecords(array $files) : array
    {
        $rows = [];
        foreach ($files as $file)
        {
            $idphoto = substr ($file, 0, strpos($file, "."));
            if (!empty($idphoto) && $idphoto === intval($idphoto))
            {
                $sql = "SELECT * FROM photos WHERE idphoto = " . $idphoto;

                $row = $this->_db->select($sql);
                if (empty($row))
                {
                    $rows[] = [$file];
                }
            } else {
                $rows[] = [$file];
            }
        }
        return $rows;
    }
}
?>