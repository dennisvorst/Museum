<?php
interface iListModel
{
    function __construct(MysqlDatabase $db, Log $log);
    function getFeatured() : array;
    function getRecordsByYear(int $year) : array;
    function getRecordsByAlphabet(string $letter) : array;
    function getRecordsByDate(string $date) : array;

    function getArticleRecords(int $id) : array;
    function getClubRecords(int $id) : array;
    function getPersonRecords(int $id) : array;
    function getPhotoRecords(int $id) : array;
    function getVideoRecords(int $id) : array;

}
?>