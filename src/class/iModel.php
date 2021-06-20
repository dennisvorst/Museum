<?php
interface iModel
{
    function __construct(array $row);
    function getThumbnailData() : string;
    function getPageData() : string;
}
?>