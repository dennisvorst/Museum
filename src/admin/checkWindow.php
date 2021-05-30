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
        
        } else {
            $html .= "<b>everything is fine here. Go play ball.</b>";
        }
        return $html;
    }
}
?>
