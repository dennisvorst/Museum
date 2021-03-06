<?php

/** todo : make the webstie wider so that the pitching table fits
 * todo : remove the classes i dont need in the index.php
 * todo: rename all the query to sql
 * all the row to row
 * all the class row to _row
*/
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

// https://blog.bobbyallen.me/2013/03/23/using-composer-in-your-own-php-projects-with-your-own-git-packageslibraries/
if ($_SERVER['SERVER_NAME'] == "localhost")
{
    require '../vendor/autoload.php';
} else {
    // production servers
    require_once 'autoload/MysqlDatabase/Log.php';
    require_once 'autoload/MysqlDatabase/MysqlConfig.php';
    require_once 'autoload/MysqlDatabase/MysqlDatabase.php';
}


//*********************************************************
// *** Include Section
//*********************************************************
require_once "class/Date.php";
require_once "class/MainPage.php";
require_once "class/ListPage.php";
require_once "class/SingleItemPage.php";
require_once "class/Article.php";
require_once "class/Articles.php";
require_once "class/Club.php";
require_once "class/Clubs.php";
require_once "class/Contact.php";

require_once "class/Clubretired.php";

require_once "class/Competition.php";
require_once "class/Competitions.php";

require_once "class/Game.php";
require_once "class/Games.php";

require_once "class/HallOfFamers.php";
require_once "class/Home.php";
require_once "class/Menu.php";
require_once "class/MenuBar.php";
require_once "class/Photo.php";
require_once "class/Photos.php";
require_once "class/Person.php";
require_once "class/Persons.php";

require_once "class/Participant.php";
require_once "class/Participants.php";

require_once "class/Search.php";
require_once "class/Social.php";
require_once "class/Source.php";
require_once "class/Statistics.php";
require_once "class/Statistic.php";

require_once "class/Teams.php";

require_once "class/Video.php";
require_once "class/Videos.php";

//*********************************************************
// *** Data Section
//*********************************************************
/* some init stuff just in case it is not set in the $_GET or $_POST */
$option = "home";
$title = "Nederlands Honkbal en Softbal Museum";

//$config = new MysqlConfig();
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

/* get the $_GET variables */
$keys = array_keys($_GET);
foreach ($keys as $key){
	${$key} = $_GET[$key];
}

if (isset($nmalphabet)){
	ListPage::$nmalphabet = $nmalphabet;
}
if (isset($nryear)){
	ListPage::$nryear = $nryear;
}

/* tab pagination stuff */
if (isset($nrcurrentarticlespage)){
	Articles::$nrcurrentarticlespage = $nrcurrentarticlespage;
}
if (!isset($nrpage)){
	$nrpage = 1;
}
if (!isset($nmtab)){
	$nmtab = "";
}

/* menubar stuff */
if (isset($nrcurrent)){
	MenuBar::$stripnumber = $nrcurrent;
}
if (isset($option)){
	MenuBar::$option = $option;
}

//*********************************************************
// *** Object Section
//*********************************************************
$object = "";
if (empty($option)){
	$object = new Home($db);
} else {
	$object = ucfirst($option);
	$object = new $object($db, $log);
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

	<!-- initiate font awesome -->
	<script src="https://kit.fontawesome.com/af1eec186a.js" crossorigin="anonymous"></script>

    <!-- https://support.google.com/analytics/answer/1008080?hl=nl -->
    <?php 
    if ($_SERVER['SERVER_NAME'] == "www.honkbalmuseum.nl")
    {
        include_once("config/analyticstracking.php");
    }
    ?>
    <title><?php echo $title; ?></title>
  </head>
  <body>
  <?php
	$socialObj = new Social();
	echo $socialObj->addFacebookPrefix();
	?>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- center -->
                <header>
                    <div class="container">
                        <div class="row">        
                            <div class="col-md-6 col-xs-6  text-right">
                                <h1>Nederlands<br>Honkbal en Softbal<br>Museum</h1>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <img src="images/logo.png" class="img-responsive" width="175"/>
                            </div>
                        </div>
                    </div>
		        </header>
                <!-- button bar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <form class="form-inline my-2 my-lg-0" action='search.php' method='post' accept-charset='utf-8'>
                            <input class="form-control mr-sm-2" type="search" placeholder="Zoeken" aria-label="Zoeken" name='query'>
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Zoek</button>
                        </form>
                    </div>
                </nav>

                <!-- main section -->
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <!-- menu -->
    	                        <?php
        	                    $menu = new Menu();
            	                echo $menu->getMainMenu($option);
                    	        ?>
                            </div>
                            <div class="col-lg-6">
                                <!-- main part of the website -->
                                <?php
                                try {
                                    /* if an id is set then pass it, but not when the classname is Home */
                                    if (get_class($object) != "Home" && !empty($id)){
                                        $object->setId($id);
                                        echo $object->getMain($nmtab, $nrpage);

                                    } elseif (get_class($object) == "Search"){
                                        /* if there is a query then load the query otherwise show the search field */
                                        if (isset($sql) && !empty($sql)){
                                            $object->setQuery($sql);
                                        } else {
                                            echo $object->getMain();
                                        }
                                    } else {
                                        echo $object->getMain($nmtab, $nrpage);
                                    }

                                } catch (Exception $e) {
                                	$log->write("Error: " . $e->getMessage());
                                    echo "Whoops, er is iets misgegaan. Neem contact op met de website beheerder.\n";
                                    echo "Error: " . $e->getMessage();
                                    return;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
                <footer>
                    <div class="text-center">
                        <a class="btn btn-lg btn-social-icon btn-twitter" href="http://www.twitter.com/honkbalmuseum" target="_blank" title="Ga naar onze twitter feed" rel="nofollow">
                        <span class="fa fa-twitter"></span>
                        </a>
                        <a class="btn btn-lg btn-social-icon btn-youtube" href="http://www.youtube.com/user/Honkbalmuseum" target="_blank" title="Ga naar ons youtube kanaal" rel="nofollow">
                        <span class="fa fa-youtube"></span>
                        </a>
                        <a class="btn btn-lg btn-social-icon btn-envelope" href="mailto:info@honkbalmuseum.nl" target="_blank" title="Stuur ons een email" rel="nofollow">
                        <span class="fa fa-envelope"></span>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </div>

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