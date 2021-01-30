<?php
/**
 * todo: remove all the stats and go year by year
 */
require_once "ListPage.php";
//require_once "MysqlDatabase.php";
//require_once "Log.php";
require_once "Fielding.php";
require_once "Pitching.php";
require_once "Hitting.php";

/** phpunit naming conflict with Stats therefore back to stats */
class Statistics extends ListPage
{
	protected $_headers = [];
	protected $_keys = [];
	protected $_title = "Statistieken";

    protected $_totals =[];

	function __construct(MysqlDatabase $db, Log $log)
	{
		parent::__construct($db, $log);
	}

    protected function _getTotals() : array
    {
        $tot = [];
        /** set the elements in the correct order */
        foreach ($this->_keys as $key)
        {
            $tot[$key] = 0;
        }
        /** summarize */
        foreach ($this->_rows as $row)
        {
            foreach ($this->_keys as $key)
            {
                if (is_numeric($row[$key]))
                {
                    if (array_key_exists($key, $tot))
                    {
                        $tot[$key] += $row[$key];
                    } else {
                        $tot[$key] = $row[$key];
                    }
                }
            }
        }
        return $tot;
    }

	function getTeamStats(int $id) : string
	{
	}

    /** todo: make this a function that just creates on table that can be reused by fielding, hitting and pitching
     * todo : move the creation of all three to the person class.
     */
	function getPersonStats(int $id) : string
	{
		/* get the stats of a person */
		$html = "";

		/** Fielding */
		$fielding = new Fielding($this->_db, $this->_log);
		$html .= $fielding->getPersonStats($id);

		/** Hitting */
		$hitting = new Hitting($this->_db, $this->_log);
		$html .= $hitting->getPersonStats($id);

		/** Pitching */
		$pitching = new Pitching($this->_db, $this->_log);
		$html .= $pitching->getPersonStats($id);

		return $html;
	}

    function show() : string
    {
        $html = "";
		/* process the stats */
		if (count($this->_rows) > 0){
			$table = new HtmlTable();
			$html	.= "<h2 class='art-postheader'>{$this->_title}</h2>\n";
			array_unshift($this->_totals, "Totaal", "");
			$html	.= $table->createHtmlTable($this->_headers, $this->_rows, $this->_totals);
		}
		return $html;
	}

	protected function _format(float $value, int $decimals) : string
    {
        $result = "";
        $i=0;
        /** look for a decimal pointer */
        if (strpos($value, ".") > 0)
        {
            /** how much space left after the decimal pointer */
            $result = $value;
            $i = strlen(substr($result, strpos($result, ".")+1));
            //print_r("{$result} has {$i} decimal <br>");
        } else {
            /** no decimal pointer */
            $result .= $value . ".";
        }
        while ($i < $decimals)
        {
            $result .= "0";
            $i++;
        }
        return $result;
    }

    /** getters and setters */
    protected function _getRows() : array
    {
        return $this->_rows;
    }
    protected function _getHeaders() : array
    {
        return $this->_headers;
	}
	function getTitle() : string
	{
		return $this->_title;
	}
}
?>