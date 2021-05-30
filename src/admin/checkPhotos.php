<?php
require_once('class/File.php');

// https://blog.bobbyallen.me/2013/03/23/using-composer-in-your-own-php-projects-with-your-own-git-packageslibraries/
if ($_SERVER['SERVER_NAME'] == "localhost")
{
    require '../../vendor/autoload.php';
} else {
    // production servers
    require_once 'autoload/MysqlDatabase/Log.php';
    require_once 'autoload/MysqlDatabase/MysqlConfig.php';
    require_once 'autoload/MysqlDatabase/MysqlDatabase.php';
}


$log = new Log("museum.log");

switch ($_SERVER['SERVER_NAME'])
{
    case "localhost":
        /* localhost */
        $mysqli = new Mysqli("localhost", "root", "", "museum");
        break;
    case "www.honkbalmuseum.nl":
        include "inc/www.honkbalmuseum.nl.inc";
        break;
    case "test.honkbalmuseum.nl":
        include "inc/test.honkbalmuseum.nl.inc";
        break;
}

try {
    $db = new MysqlDatabase($mysqli, $log);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    return;
}

/* init */
$photoPath = "../../db/images/photos";
$thumbnailPath = "../../db/images/thumbnails";


$sql = "SELECT idphoto as id FROM photos ORDER BY idphoto";
$result = $db->select($sql);

$photos = scandir($photoPath);
$thumbnails = scandir($thumbnailPath);

$differencePhotosWithoutThumbnails = array_diff($photos, $thumbnails);
$differenceThumbnailsWithoutPhotos = array_diff($thumbnails, $photos);

$keys = [];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Records that have no corresponding photo</title>
  </head>
  <body>
    <h1>Records that have no corresponding photo</h1>

    <table class="table">
        <tr>
            <th scope="col">Nr</th>
            <th scope="col">id</th>
            <th scope="col">Filename</th>
            <th scope="col">Article</th>
        </tr>
            <?php
            $number = 1;
            foreach ($result as $photo){
                $keys[$photo['id']] = $photo['id'];

                if (!file_exists($photoPath . "/" . $photo['id'] . ".jpg")){
					/* get the corresponging article */
					$sql = "SELECT idarticle FROM photos p, articlephotos a WHERE p.idphoto = ? and a.idphoto = p.idphoto";
					$articleId = $db->select($sql, "i", [$photo['id']]);

                    if (!empty($articleId)) 
                    {
                        $articleId = $articleId[0]['idarticle'];
                    } else {
                        $articleId = "";
                    }

                    echo "<tr>\n";
                    echo "<th scope='row'>" . $number++ . "</th>";
                    echo "<td>" . $photo['id'] . "</td>";
                    echo "<td>Foto " . $photoPath . "/" . $photo['id'] . ".jpg" . " niet gevonden</td>";
                    echo "<td><a href='http://www.honkbalmuseum.nl/index.php?id=" . $articleId . "&nmclass=article' target='_new'>" . $articleId . "</a></td>";
					echo "</tr>";
                }
            }
            ?>
        </tr>
    </table>


    <h1>Photos that have no corresponding record</h1>
    <table class="table">
        <tr>
            <th scope="col">Nr.</th>
            <th scope="col">Photo</th>
            <th scope="col">id</th>
            <th scope="col">descr</th>
        </tr>
        <tr>
        <?php
            $number = 1;
            foreach ($photos as $photo){
                if (File::endsWith($photo, ".jpg") && !array_key_exists(intval($photo), $keys)){
                    echo "<tr>\n";
					echo "<th scope='row'>" . $number++ . "</th>\n";
					echo "<td>" . $photo . "</td>\n";
                    echo "<td>" . intval($photo) . "</td>\n";
                    echo "<td>NIET gevonden in database</td>\n";
					echo "</tr>\n";
                }
            }
        ?>
        </tr>
    </table>

    <h1>Photos that donot have thumbnails</h1>
    <?php
    if (count($differencePhotosWithoutThumbnails) > 0) {
        ?>
        <table class="table">
            <tr>
                <th scope="col">Nr.</th>
                <th scope="col">Photo</th>
                <th scope="col">id</th>
                <th scope="col">descr</th>
            </tr>
            <tr>
            <?php
                $number = 1;
                foreach ($differencePhotosWithoutThumbnails as $photo){
                    echo "<tr>\n";
                    echo "<th scope='row'>" . $number++ . "</th>\n";
                    echo "<td>" . $photo . "</td>\n";
                    echo "<td>" . intval($photo) . "</td>\n";
                    echo "</tr>\n";
                }
            ?>
            </tr>
        </table>
        <?php
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
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    </body>
</html>