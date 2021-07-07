<?php
interface iPageView
{
    function __construct(array $row);
    function show() : string;
    function showThumbnail() : string;
}
?>