<?php
interface iPageModel
{
    function __construct(MysqlDatabase $db, Log $log, int $id);
    function getData() : array;
}
?>