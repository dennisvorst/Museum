<?php
/** check the competitions */
require_once "checkWindow.php";

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

$window = new checkWindow();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
    <?php
    /** Competitions without atleast two participants */
    //$sql= "Select * from competitions where idcompetition not in (select idcompetition from participants having count(*) >= 2)";
    $sql = "select * from competitions where not exists (select null from participants where participants.idcompetition = competitions.idcompetition) order by nryear desc";
    echo $window->show("Competitions without atleast two participants", $db->select($sql));

    /** Competitions without games */
    //$sql = "select * from competitions where idcompetition not in (select idcompetition from games)";
    $sql = "select * from competitions where not exists (select null from games where games.idcompetition = competitions.idcompetition) order by nryear desc";
    echo $window->show("Competitions without games", $db->select($sql));

    /** Games without competitions */
    $sql = "select * from games where idcompetition is null";
    echo $window->show("Games without Competitions", $db->select($sql));

    /** Games without participants */
    $sql = "select * from games where idhome is null or idaway is null";
    echo $window->show("Games without Participants", $db->select($sql));

    /** Games with teams playing themselves */
    $sql = "select * from games where idhome = idaway";
    echo $window->show("Games with the same participant as both home and away", $db->select($sql));


    ?>
    <h1>update the start and enddates of the competition</h1>
    <pre><code>
    UPDATE competitions
                SET dtstart = (SELECT min(dtstart) from games where gems.idcompetition = competitions.idcompetition), 
                    dtend = (SELECT max(dtstart) from games where gems.idcompetition = competitions.idcompetition), 
                        updated_at = current_timestamp();

    </code></pre>

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
