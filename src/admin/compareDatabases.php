<?php
/**
 * Assumption: there is an old database ana new database and all the stuff that was in the old database must be in the new database. The new database sort of grew on top of the old database.
 */
/* start a database */
$new_db = "museum_test";
$old_db = "museum_dell";

require '../../vendor/autoload.php';

$log = new Log("museum.log");
$mysqli = new Mysqli("localhost", "root", "", "museum");
$db = new MysqlDatabase($mysqli, $log);

/* get the tables  */
$old_tables = getAllTables($db, $old_db);
$new_tables = getAllTables($db, $new_db);

//$old_tables = ["videos", "clubs", "clubvideos"];
//$new_tables = ["videos", "clubs", "clubvideos"];

/** skip the tech tables */
//unset($net_tables['users']);
//unset($net_tables['transporterrun']);

echo "Nieuwe database :" . $new_db . "<br>"; 
echo "Oude database   :" . $old_db . "<br>";

/* show tables not in the new database but in the old */
echo "<h1>Zoeken naar tabellen die aanwezig zijn in {$old_db} maar niet in {$new_db}</h1>";

$tables = array_diff ($old_tables, $new_tables);
if (!empty($tables)) 
{
    echo "<h1>Tabellen aanwezig in {$old_db} maar niet aanwezig in {$new_db}</h1>";
    foreach($tables as $table)
    {
        echo "<ul>";
        echo "<li>" . $table . "</li>";
        unset($old_tables[$table]);
        echo "</ul>";
    }
} else {
    echo "Geen gevonden";
}

/* show tables not in the old database but in the new */
echo "<h1>Zoeken naar tabellen die aanwezig zijn in {$new_db} maar niet in {$old_db}</h1>";
$tables = array_diff ($new_tables, $old_tables);
if (!empty($tables)) 
{
    echo "<h1>Tabellen aanwezig in {$new_db} maar niet aanwezig in {$old_db}</h1>";
    foreach($tables as $table)
    {
        echo "<ul>";
        echo "<li>" . $table . "</li>";
        unset($new_tables[$table]);
        echo "</ul>";
    }
} else {
    echo "Geen gevonden";
}


/* find records that are in the old database but not in the new */
echo "<h1>Zoeken naar records die voorkomen in de {$new_db} maar niet in de {$old_db}</h1>";

foreach($old_tables as $old_table)
{
    echo "<h2>Zoeken in {$old_table}</h2>";
    foreach($new_tables as $new_table)
    {
        $old_pk = getPrimaryKeyField($db, $old_db, $old_table);
        $new_pk = getPrimaryKeyField($db, $new_db, $new_table);

        if ($old_table == $new_table) 
        {
            $sql = "SELECT * FROM {$old_db}.{$old_table} WHERE {$old_pk} NOT IN (SELECT {$new_pk} FROM {$new_db}.{$new_table})";
            $rows = $db->select($sql);

            if (!empty($rows)) 
            {
                echo "<h1>records missing from {$new_db}.{$new_table}</h1>";
                {
                    foreach ($rows as $row)
                    {
                        print_r($row);
                        print_r("<br>");
                    }
                }
            } else {
                echo "Geen gevonden";
            }
        }
    }
}

echo "<h1>Vergelijken van records in beide databases</h1>";
foreach($old_tables as $old_table)
{
    echo "<h2>Zoeken in {$old_table}</h2>";

    foreach($new_tables as $new_table)
    {
        if ($old_table == $new_table) 
        {
            $old_pk = getPrimaryKeyField($db, $old_db, $old_table);
            $new_pk = getPrimaryKeyField($db, $new_db, $new_table);

            $old_columns = getAllColumns($db, $old_db, $old_table);
            $new_columns = getAllColumns($db, $new_db, $new_table);

            // print_r($new_columns);
            // print_r("<br>");

            echo "<h3>Kolommen aanwezig in {$old_db}.{$old_table} maar niet aanwezig in {$new_db}.{$new_table}</h3>";
            $columns = array_diff ($old_columns, $new_columns);
            if (!empty($columns)) 
            {
                foreach($columns as $column)
                {
                    echo "<ul>";
                    echo "<li>" . $column . "</li>";
                    unset($old_columns[$column]);
                    echo "</ul>";
                }
            } else {
                echo "Geen gevonden";
            }

            echo "<h3>Kolommen aanwezig in {$new_db}.{$new_table} maar niet aanwezig in {$old_db}.{$old_table}</h3>";
            $columns = array_diff ($new_columns, $old_columns);
            if (!empty($tables)) 
            {
                foreach($columns as $column)
                {
                    echo "<ul>";
                    echo "<li>" . $column . "</li>";
                    unset($new_columns[$column]);
                    echo "</ul>";
                }
            } else {
                echo "Geen gevonden";
            }


            /* compare records that have the same id */
            echo "<h3>Vergelijken op recordniveau</h3>";

            $sql = "SELECT ". implode(", ", $old_columns) . " FROM {$old_db}.{$old_table} WHERE {$old_pk} IN (SELECT {$new_pk} FROM {$new_db}.{$new_table})";
            $rows = $db->select($sql);
            
            $mismatches = [];
            foreach ($rows as $old_row)
            {
                $sql = "SELECT ". implode(", ", $new_columns) . " FROM {$new_db}.{$new_table} WHERE {$new_pk} = ?";
                $new_row = $db->select($sql, "i", [$old_row[$old_pk]]);
                $new_row = $new_row[0];
                
                $mismatch = false;
                foreach ($old_columns as $old_column)
                {
                    if ($old_row[$old_column] !== $new_row[$old_column])
                    {
                        $mismatch = true;
                    } else {
                        /** maybe make the matching columns empty?? */
                        if ($old_column !== $old_pk) 
                        {
                            $old_row[$old_column] = "";
                        }
                    }
                }
                if ($mismatch) 
                {
                    $mismatches[] = $old_row;
                }
            }
            if (!empty($mismatches)) 
            {
                echo "<h1>mismatches in records {$new_db}.{$new_table} and {$old_db}.{$old_table}</h1>";
                {
                    echo "<table>";
                    echo "<tr><th>" . implode("</th><th>", $old_columns) . "</th></tr>";

                    foreach ($mismatches as $mismatch)
                    {
                        echo "<tr><td>" . implode("</td><td>", $mismatch) . "</td></td>";
                    }
                    echo "<table>";
                    
                }
    
            }
        }
    }
}


/**
 * functions
 */
function getAllTables(MysqlDatabase $db, string $database) : array 
{
    $sql = "select distinct(table_name) as table_name from information_schema.columns where table_schema = ? order by table_name"; 
    $rows = $db->select($sql, "s", [$database]);

    $tables = [];
    foreach ($rows as $row)
    {
        $tables[] = $row['table_name'];
    }

    return $tables;
}

function getPrimaryKeyField(MysqlDatabase $db, string $database, string $table) : string
{
    $sql = "SELECT k.column_name
            FROM information_schema.table_constraints t
            JOIN information_schema.key_column_usage k
            USING(constraint_name,table_schema,table_name)
            WHERE t.constraint_type='PRIMARY KEY'
              AND t.table_schema= ? 
              AND t.table_name=? ";

    $rows = $db->select($sql, "ss", [$database, $table]);

return $rows[0]['column_name'];              
}

function getAllColumns(MysqlDatabase $db, string $database, string $table) : array 
{
    $sql = "SELECT column_name 
            FROM information_schema.columns 
            WHERE table_schema = ? 
            AND table_name = ? 
            AND column_name NOT IN ('updated_by', 'created_at', 'updated_at')
            order by table_name,ordinal_position"; 
    $rows = $db->select($sql, "ss", [$database, $table]);
    $columns = [];
    foreach ($rows as $row)
    {
        $columns[] = $row['column_name'];
    }
    return $columns;

}
?>

<!-- later -->
<form>

</form>