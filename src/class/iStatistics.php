<?php
/** phpunit naming conflict with Stats therefore back to stats */
interface iStatistics
{
    function show();

    function getPersonStats(int $id) : string;
    function getTeamStats(int $id) : string;
    function getTitle() : string;  
}
?>