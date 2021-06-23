<?php
interface iModel
{
    function __construct(array $row);
    function getDataArray() : array;
}
?>