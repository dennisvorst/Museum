<?php 
class CheckSources
{
    function __construct()
    {

    }

    function show() : string
    {
        $html = "";
        $html .= $this->showSourcesWithoutAnyContent();
        $html .= $this->showImagesWithoutSources();
        $html .= $this->showArticlesWithoutSources();
        $html .= $this->showVideosWithoutSources();
        return $html;
    }
    
    function showSourcesWithoutAnyContent() : string 
    {
        return "
        <h1>Sources Without Any Images, Articles or Videos</h1>
        <p>To be implemented</p>
        ";
    }

    function showImagesWithoutSources() : string
    {
        return "
        <h1>Images Without Sources</h1>
        <p>To be implemented</p>
        ";
    }

    function showArticlesWithoutSources() : string
    {
        return "
        <h1>Articles Without Sources</h1>
        <p>To be implemented</p>
        ";
    }

    function showVideosWithoutSources() : string
    {
        return "
        <h1>Articles Without Sources</h1>
        <p>To be implemented</p>
        ";
    }

}

?>