<?php
/** class that shows a title and the result of the check that was performed */
require_once "../class/HtmlTable.php";

class checkWindow
{
    function __construct()
    {
    }

    function show(string $title, array $rows) : string 
    {
        $html = "<h1>{$title}</h1>";

        if (count($rows) > 0) 
        {
            $keys = array_keys($rows[0]);
            $table = new HtmlTable();
            $table->addRow(new HtmlTableRow($keys, [], "H"), "H");

            foreach ($rows as $row)
            {
                $table->addRow(new HtmlTableRow($row));
            }
    
            $html .= $table->getElement();   
        
        } else {
            $html .= "<b>everything is fine here. Go play ball.</b>";
        }
        return $html;
    }
}
?>
