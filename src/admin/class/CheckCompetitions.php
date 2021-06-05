<?php 
require_once "CheckResult.php";

class CheckCompetitions
{
    protected $result;
    protected $db;

    function __construct(MysqlDatabase $db)
    {
        $this->result = new CheckResult();
        $this->db = $db;
    }

    function show() : string
    {
        $html = "";
        $html .= $this->showCompetitionsWithoutParticipants();
        $html .= $this->showCompetitionsWithoutGames();
        $html .= $this->showGamesWithoutCompetitions();
        $html .= $this->showGameswithoutParticipants();
        $html .= $this->showGamesWithIdenticalHomeAndAwayTeams();
        return $html;
    }

    function showCompetitionsWithoutParticipants() : string
    {
        /** Competitions without atleast two participants */
        $title = "Competitions without atleast two participants";
        $sql = "select * from competitions where not exists (select null from participants where participants.idcompetition = competitions.idcompetition) order by nryear desc";
        
        $rows = $this->db->select($sql);
        return $this->result->show($title, $rows);
    }

    function showCompetitionsWithoutGames() : string
    {

        /** Competitions without games */
        $title = "Competitions without games";
        $sql = "select * from competitions where not exists (select null from games where games.idcompetition = competitions.idcompetition) order by nryear desc";

        $rows = $this->db->select($sql);
        return $this->result->show($title, $rows);
    }

    function showGamesWithoutCompetitions() : string
    {
        /** Games without competitions */
        $title = "Games without Competitions";
        $sql = "select * from games where idcompetition is null";

        $rows = $this->db->select($sql);
        return $this->result->show($title, $rows);
    }

    function showGameswithoutParticipants() : string
    {
        /** Games without participants */
        $title = "Games without Participants";
        $sql = "select * from games where idhome is null or idaway is null";

        $rows = $this->db->select($sql);
        return $this->result->show($title, $rows);
    }

    function showGamesWithIdenticalHomeAndAwayTeams() : string
    {
        /** Games with teams playing themselves */
        $title = "Games with the same participant as both home and away";
        $sql = "select * from games where idhome = idaway";

        $rows = $this->db->select($sql);
        return $this->result->show($title, $rows);
    }
}
?>