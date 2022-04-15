<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once('3rd/fpdf/fpdf.php');
require_once('class/ArticlePdfView.php');

// connect to the database 
if ($_SERVER['SERVER_NAME'] == "localhost")
{
    require '../vendor/autoload.php';
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

$sql = "SELECT idarticle FROM articles ORDER BY idarticle";
$rows = $db->select($sql, "", []);

$outputFolder = "output/articles/";

//$i = 1;
foreach ($rows as $row)
{

	$id = $row['idarticle'];

	// get the article 
	$articleModel = new ArticleModel($db, $log, $id);
	$article = $articleModel->getData();
//	$article = $article['article'];
//	print_r($article);

	$pdf = new ArticlePdfView(json_encode($article));

//	if ($i>10)
//	{
//		break;
//	}
//	$i++;
}

print_r("Done");
?>