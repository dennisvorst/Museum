<?php
require_once "class/Database.php";
require_once "class/Mysql.php";

$db = new Database();

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