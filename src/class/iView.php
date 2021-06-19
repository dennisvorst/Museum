<?php
interface iView
{
    function __construct(string $json);
    function show() : string;
    function showThumbnail() : string;
}
?>