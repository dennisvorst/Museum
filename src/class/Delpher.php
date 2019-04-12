<?php
/**
 * Colors 
 * Background color 9ABCB8
 * Font color       222222
 */
class Delpher{
    /* The class that generates the button to search for the same result at the www.delpher.nl website. */
    static function createButton(string $search = null) : string 
    {
        $html = "";
        if (!empty($search))
        {
            /** Create the query string  */
            $query = str_replace ( " ", "+", $search);

            /** and the url */
            $url = "https://www.delpher.nl/nl/platform/results?query=" . $query . "&coll=platform";

            /** https://www.delpher.nl/nl/platform/results?query=blurp+en+snarf&coll=platform */
            $html = "<button type='button' class='btn btn-success'>Success</button>";
            $html = "<a href='" . $url . "' class='btn button-delpher_nl active' role='button' aria-pressed='true' target='_new'>Zoek op www.Delpher.nl</a>";
        }
        return $html;
    }
}