<?php
/** phpunit naming conflict with Stats therefore back to stats */
interface iStatistics
{
    function show();

    function getPersonStatistics(int $id) : string;
    function getTeamStatistics(int $id) : string;
    function getTitle() : string;  
}
?>