<?php
interface iListView
{
    function __construct(array $rows);
    function show() : string;
}
?>