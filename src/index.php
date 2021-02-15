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
// todo : remove when going live
require '../vendor/autoload.php';


//*********************************************************
// *** Include Section
//*********************************************************
require_once "class/Date.php";
//require_once 'class/Log.php';
//require_once 'class/MysqlConfig.php';
//require_once 'class/MysqlDatabase.php';
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
$nmclass = "home";
$title = "Nederlands Honkbal en Softbal Museum";

//$config = new MysqlConfig();
$log = new Log("museum.log");

switch ($_SERVER['SERVER_NAME']){
    case "localhost":
        /* localhost */
        $mysqli = new Mysqli("localhost", "root", "", "museum");
        break;
    case "www.honkbalmuseum.nl":
        include "www.honkbalmuseum.nl.inc";
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
if (isset($nmclass)){
	MenuBar::$nmclass = $nmclass;
}

//*********************************************************
// *** Object Section
//*********************************************************
$object = "";
if (empty($nmclass)){
	$object = new Home($db);
} else {
	$object = ucfirst($nmclass);
	$object = new $object($db, $log);
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- set the UTF-8 properties -->
	<!-- as defined in : https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- initiate font awesome -->
	<script src="https://kit.fontawesome.com/af1eec186a.js" crossorigin="anonymous"></script>

    <!-- https://support.google.com/analytics/answer/1008080?hl=nl -->
    <?php include_once("config/analyticstracking.php") ?>

    <title><?php echo $title; ?></title>

</head>
<body>
	<?php
	$socialObj = new Social();
	echo $socialObj->addFacebookPrefix();
//	echo Social::addFacebookPrefix();
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
            	                echo $menu->getMainMenu($nmclass);
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>