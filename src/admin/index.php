<?php
require_once('class/Log.php');
require_once('class/MysqlConfig.php');
require_once('class/MysqlDatabase.php');
require_once "class/Mysql.php";

$log = new Log("museum.log");
$config = new MysqlConfig();
$db = new MysqlDatabase($config, "museum", $log);

$keys = array_keys($_GET);
foreach($keys as $key)
{
    ${$key} = $_GET[$key];
}
?>
<html>
    <head>
    </head>
    <body>
        <?php
        
        if (isset($server)) {
            if (isset($table)) {
                /** Show the table content 
                 *  sorting can only be done on tables 
                 */
                $table = ['TABLE_SCHEMA' => $server, 'TABLE_NAME' => $table];
                if (isset($orderby))
                {
                    $mysql = new MysqlTable($db, $table, $orderby, $direction);
                } else {
                    $mysql = new MysqlTable($db, $table);
                }
                echo $mysql->showRecordsPage();
            } else {
                /** show the database content  */
                $server = ['SCHEMA_NAME' => $server];
                $mysql = new MysqlServer($db, $server);
                echo $mysql->showTablesPage();    
            }
        } else {
            /** show the server content */
            $mysql = new Mysql($db);
            echo $mysql->showServersPage();
        }
        ?>
    </body>
</html>