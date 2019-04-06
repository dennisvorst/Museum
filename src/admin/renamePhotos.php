<?php
/** rename the files in de folder and strip the proceeding zero's, except the first one that must remain a 0.jpg */
require_once("class/File.php");

$path = "../../db/images/photos";
$path = "../../db/images/thumbnails";

$photos = scandir($path);
foreach ($photos as $photo)
{
    if (File::endsWith($photo, ".jpg")) 
    {

        if (file_exists($path . "/" . $photo) )
        {
            /** rename it */
            $newPhotoName = createNewFileName($photo);
            echo "renaming " . $photo . " into " . $newPhotoName .  "</br>";
            rename ($path . "/" . $photo, $path . "/" . $newPhotoName);
    
        } else {
            echo $photo . " niet gevonden</br>";
        }
    }
}

function createNewFileName($photo){
    /** find the value and that is the start of the file name  
     * the "" is to turn the numbervalue back into a string 
     * 
    */
    return substr($photo, strrpos($photo, "" . intval ( $photo )));
}
?>