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
// *** Include Section (3rd party)
//*********************************************************
//require_once "3rd/class/Mobile_Detect.php";

//*********************************************************
// *** Determine the device type
//*********************************************************
/* get the mobile properties */
//$detect = new Mobile_Detect;

/* on the small screen show a small image */
//if ( $detect->isMobile() ) {
//	print_r("Mobile");
//} elseif ( $detect->isTablet() ) {
//	print_r("Tablet");
//} else {
//	print_r("Monitor");
//}

//*********************************************************
// *** Data Section
//*********************************************************
/* some init stuff just in case it is not set in the $_GET or $_POST */
$nmclass = "home";

$config = new MysqlConfig();
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
	MenuBar::$nrcurrent = $nrcurrent;
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
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
	<!-- set the UTF-8 properties -->
	<!-- as defined in : https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql -->
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Honkbalmuseum</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- initiate font awesome -->
	<script src="https://kit.fontawesome.com/af1eec186a.js" crossorigin="anonymous"></script>

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="css/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="css/style.responsive.css" media="all">


	<style>
	.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
    .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    </style>

    <!-- https://support.google.com/analytics/answer/1008080?hl=nl -->
    <?php include_once("config/analyticstracking.php") ?>
</head>
<body>
	<?php
	$socialObj = new Social();
	echo $socialObj->addFacebookPrefix();
//	echo Social::addFacebookPrefix();
	?>
	<div id="art-main">
		<header class="art-header">
		    <div class="art-shapes"></div>
		</header>
        <nav class="art-nav">
            <ul class="art-hmenu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="index.php?nmclass=search">Zoeken</a></li>
            </ul>
        </nav>
		<div class="art-sheet clearfix">
        <div class="art-layout-wrapper">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-sidebar1">
                    	<div class="art-vmenublock clearfix">
	                        <div class="art-vmenublockcontent">
    	                        <?php
        	                    $menu = new Menu();
            	                echo $menu->getMainMenu($nmclass);
                	            $menu	= null;
                    	        ?>
                        	</div>

	                    </div>
                        <div class="art-block clearfix">
        	            </div>
            	    </div>
                    <!-- Main section -->

                    <?php
                    try {
                        /* if an id is set then pass it, but not when the classname is Home */
                        if (get_class($object) != "Home" && !empty($id)){
                            $object->setId($id);
                            echo $object->getMain($nmtab, $nrpage);

                        } elseif (get_class($object) == "Search"){
                            /* if there is a query then load the query otherwise show the search field */
                            if (isset($sql)){
                                $object->setFtsearch($sql);
                            } else {
                                echo $object->getMain();
                            }
                        } else {
                            echo $object->getMain($nmtab, $nrpage);
                        }

                    } catch (Exception $e) {
                        echo "Whoops, er is iets misgegaan. Neem contact op met de website beheerder.\n";
                        return;
                    }
                    

                    ?>

                    </div>
                </div>

                <!-- Footer Section -->
                <footer class="art-footer">
                    <div class="text-center">
                        <a class="btn btn-lg btn-social-icon btn-facebook" href="https://www.facebook.com/honkbalmuseum" target="_blank" title="Ga naar onze facebook pagina" rel="nofollow">
                        <span class="fa fa-facebook"></span>
                        </a>
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
    <!-- unobtrusive javascript -->
    <!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
	<!-- if it is not loaded -->
	<script>window.jQuery || document.write('<script src="3rd/js/jquery-3.2.1.min.js"><\/script>');</script>

    <!-- Bootstrap JavaScript Library -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- if it is not loaded -->
	<script>window.jQuery || document.write('<script src="3rd/js/bootstrap.min.js"><\/script>');</script>

</body>
</html>