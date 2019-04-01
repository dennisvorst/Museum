<?php
require_once('class/database.php');
require_once('class/File.php');

/* init */
$photoPath = "../../db/images/photostest";
$thumbnailPath = "../../db/images/thumbnailstest";

$db = new Database();
$sql = "SELECT idphoto as id FROM photos ORDER BY idphoto";
$result = $db->queryDb($sql);

$photos = scandir($photoPath);
$thumbnails = scandir($thumbnailPath);

$differencePhotosWithoutThumbnails = array_diff($photos, $thumbnails); 
$differenceThumbnailsWithoutPhotos = array_diff($thumbnails, $photos); 

//print_r($differencePhotosWithoutThumbnails);
//print_r($differenceThumbnailsWithoutPhotos);

$keys = [];
?>

<html>
    <head></head>
    <body>
    <h1>Records that donot have a corresponding photo</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Filename</th>
        </tr>
            <?php 
            foreach ($result as $photo){
                $keys[$photo['id']] = $photo['id'];

                if (!file_exists($photoPath . "/" . $photo['id'] . ".jpg")){
                    echo "<tr><td>" . $photo['id'] . "</td>";
                    echo "<td>Foto " . $photoPath . "/" . $photo['id'] . ".jpg" . " niet gevonden</td></tr>";    
                } 
            }
            ?>
        </tr>
    </table>

    <h1>Photos that donot have a corresponding record</h1>
    <table>
        <tr>
            <th>Photo</th>
            <th>id</th>
        </tr>
        <tr>
        <?php
            foreach ($photos as $photo){
                if (File::endsWith($photo, ".jpg") && !array_key_exists(intval($photo), $keys)){
                    echo "<tr><td>" . $photo . "</td>";
                    echo "<td>" . intval($photo) . " NIET gevonden in database</td></tr>";    
                } 
            }
        ?>
        </tr>
    </table>

    <h1>Photos that donot have thumbnails</h1>
    <?php
    if (count($differencePhotosWithoutThumbnails) >0) {
        echo "There is a HUGE error!!!!";
    } else {
        echo "IT'S ALL GOOD!";
    }
    ?>

    <h1>Thumbnails that donot have photos</h1>
    <?php
    if (count($differenceThumbnailsWithoutPhotos) >0) {
        echo "There is a HUGE error!!!!";
    } else {
        echo "IT'S ALL GOOD!";
    }
    ?>
</html>