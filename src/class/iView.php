<?php
interface iView
{
    function __construct(array $row);
    function show() : string;
    function showThumbnail() : string;
}
?>