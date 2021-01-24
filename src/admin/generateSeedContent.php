<?php
/**
This function genewrates the seed data for the composer Phinx files 
There are four flavours: 
* db has no value - we show the databases 
* db has a value but table hasnot - we show the tables 
* db has a value and tbl has as wel - we generate the seed data andd stuf it in the textarea
 */

/* include s=ection */ 
require_once('class/Log.php');
require_once('class/MysqlConfig.php');
require_once('class/MysqlDatabase.php');
$db_name = null;
$tbl_name = null;

/* get the posted data */
if (isset($_GET['db'])) {
	$db_name = $_GET['db'];
}
if (isset($_GET['tbl'])) {
	$tbl_name = $_GET['tbl'];
}

/* init */
$log = new Log("museum.log");
$config = new MysqlConfig();
$db = new MysqlDatabase($config, "museum", $log);

$sql_db = "SELECT DISTINCT(SCHEMA_NAME) FROM INFORMATION_SCHEMA.SCHEMATA";
$sql_tbl = "";
$sql_rows = array();

$db_url = "";
$tbl_url = "";

$databases = array();
$tables = array();
$rows = array();

/* get the schema name and the database name */
/* TODO: make prepare statement proof*/
if (isset($db_name)){
	$sql_db .= " WHERE SCHEMA_NAME = '" . $db_name . "'";
	
	$sql_tbl = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '" . $db_name . "'";
	if (isset($tbl_name)){
		$sql_tbl .= " AND TABLE_NAME = '" . $tbl_name . "'";

		$sql_rows = "SELECT * FROM " . $db_name . "." . $tbl_name;
		$rows = $db->select($sql_rows);
		
	} else {
		$tables = $db->select($sql_tbl);
	}
} else {
	$databases = $db->select($sql_db);
} 

/* ctreate the DB urls */
print_r(count($databases));
if (count($databases) == 0){
	$db_url = createDatabaseUrl($db_name);
} else {
	for ($i=0; $i < count($databases); $i++) {
		$schema = $databases[$i]['SCHEMA_NAME'];
		$db_url .= createDatabaseUrl($schema) . "</br>";
	}
}

/* ctreate the TBL  urls */
$tbl_url = "<p>" . $tbl_name . "</p>";
for ($i=0; $i < count($tables); $i++) {
	$table = $tables[$i]['TABLE_NAME'];
	$tbl_url .= "<a href='?db=" . $db_name . "&tbl=" . $table . "'>" . $table . "</a></br>";
}

/* create the seed */
$html = "";
$lines = 0;
for ($i=0; $i < count($rows); $i++) {
	$keys = array_keys($rows[0]);
	
	$html .= "[\n";
	for ($j = 0; $j < count($keys); $j++) {
		if (!empty( $rows[$i][$keys[$j]] )) {
			
			$html .= "	'" . $keys[$j] . "' => '" . addslashes ( html_entity_decode( $rows[$i][$keys[$j]], ENT_QUOTES | ENT_HTML5 )) . "',\n";
			
			$lines++;
		}
	}

	$html .= "],\n";
	$lines += 2;
}

?>
<html>
	<head>
    </head>
    <body>
    	<h1>Reset</h1>
        <a href="generateSeedContent.php">reset</a>
    	<h1>Databases</h1>
        <?php 
		echo $db_url;
		?>
    	<h1>Tables</h1>
        <?php echo $tbl_url; ?>

        <h1>Result</h1>
		<textarea rows="<?php echo $lines; ?>" cols="50"><?php echo $html; ?></textarea>         
    </body>
</html>

<?php 
function createDatabaseUrl(string $schema): string {
	return "<a href='?db=" . $schema . "'>" . $schema . "</a>";
}
function createTableUrl(string $schema, string $table): string {
	return "<a href='?db=" . $db_name . "&tbl=" . $table . "'>" . $table . "</a>";
}
?>
