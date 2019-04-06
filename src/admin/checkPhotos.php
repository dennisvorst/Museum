<?php
require_once('class/database.php');
require_once('class/File.php');

/* init */
$photoPath = "../../db/images/photos";
$thumbnailPath = "../../db/images/thumbnails";

$db = new Database();
$sql = "SELECT idphoto as id FROM photos ORDER BY idphoto";
$result = $db->queryDb($sql);

$photos = scandir($photoPath);
$thumbnails = scandir($thumbnailPath);

$differencePhotosWithoutThumbnails = array_diff($photos, $thumbnails); 
$differenceThumbnailsWithoutPhotos = array_diff($thumbnails, $photos); 

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
            <th>Article</th>
        </tr>
            <?php 
            foreach ($result as $photo){
                $keys[$photo['id']] = $photo['id'];

                if (!file_exists($photoPath . "/" . $photo['id'] . ".jpg")){
					/* get the corresponging article */
					$sql = "SELECT idarticle FROM photos p, articlephotos a WHERE p.idphoto = " . $photo['id'] . " and a.idphoto = p.idphoto";
					$articleId = $db->queryDb($sql);
					$articleId = $articleId[0]['idarticle'];


                    echo "<tr><td>" . $photo['id'] . "</td>";
                    echo "<td>Foto " . $photoPath . "/" . $photo['id'] . ".jpg" . " niet gevonden</td>";
                    echo "<td><a href='http://www.honkbalmuseum.nl/index.php?id=" . $articleId . "&nmclass=article' target='_new'>" . $articleId . "</a></td>";
					echo "</tr>";    
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
                    echo "<tr>\n";
					echo "<td>" . $photo . "</td>\n";
                    echo "<td>" . intval($photo) . " NIET gevonden in database</td>\n";
					echo "</tr>\n";
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