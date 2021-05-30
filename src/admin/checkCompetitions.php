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

/** Competitions without atleast two participants */
//$sql= "Select * from competitions where idcompetition not in (select idcompetition from participants having count(*) >= 2)";
$sql = "select * from competitions where not exists (select null from participants where participants.idcompetition = competitions.idcompetition) order by nryear desc";
echo $window->show("Competitions without atleast two participants", $db->select($sql));

/** Competitions without games */
//$sql = "select * from competitions where idcompetition not in (select idcompetition from games)";
$sql = "select * from competitions where not exists (select null from games where games.idcompetition = competitions.idcompetition) order by nryear desc";
echo $window->show("Competitions without games", $db->select($sql));
?>