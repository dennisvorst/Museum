<?php
require_once('class/File.php');
require_once('class/CheckPhotos.php');
require_once('class/CheckSources.php');
require_once('class/CheckCompetitions.php');

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

/** init  */
$option = 0;
if (isset($_GET['option']))
{
    $option = $_GET['option'];
}

/** databaseconnection  */
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

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Admin: Honkbalmuseum</title>
  </head>
  <body>
    <h1>Admin: Honkbalmuseum</h1>

    <?php
        switch ($option)
        {

            case "0":
                echo showMenu();
                break;
            case "1":
                //checkPhotos
                $obj = new CheckPhotos($db);
                echo $obj->show(); 
                break;
            case "2":
                //checkSources
                $obj = new CheckSources($db);
                echo $obj->show(); 
                break;
            case "3":
                //generateSeedContent
                echo "<h1>TBD</h1>"; // $this->generateSeedContent();
                break;
            case "4":
                //checkCompetitions
                $obj = new CheckCompetitions($db);
                echo $obj->show(); 
                break;
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

<?php
    function showMenu() : string 
    {
        return "
        <h1>Menu</h1>

        <ul>
            <li><a href='index.php?option=1'>Check photos</a></li>
            <li><a href='index.php?option=2'>Check sources</a></li>
            <li><a href='index.php?option=3'>Generate seed content</a></li>

            <li><a href='index.php?option=4'>Check Competitions</a></li>
        </ul>\n";
    }
?>