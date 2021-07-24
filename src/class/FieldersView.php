<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "ListView.php";
require_once "iListView.php";
require_once "FielderView.php";

class FieldersView extends ListView implements iListView
{
	protected $_title = "Fielding";
	protected $_columnCount = 1;

	protected $_collection = [];

	/** totals */
	protected $_totNrc;
	protected $_totNrpo;
	protected $_totNra;
	protected $_totNre;
	protected $_totNrfldperc;
	protected $_totNrdp;
	protected $_totNrsba;
	protected $_totNrcsb;
	protected $_totNrsbaperc;
	protected $_totNrpb;
	protected $_totNrci;
		
	function __construct(array $rows)
	{
		parent::__construct();
		foreach ($rows as $row)
		{
			$this->_collection[] = new FielderView($row);
			$this->_getTotals($row);
		}
	}


	function show() : string
	{
		return "
		<h2>Deelnemers</h2>
		";
	}


	function showPersonalStats() : string
	{
		if (empty($this->_collection))
		{
			return "";
		} 

		/** collect */
		$header = $this->_getHeader();
		$rows	= $this->_getRows();
		$footer	= $this->_getFooter();

		/** create the table */
		$table = "
		<table class='table'>
		{$header}
		{$rows}
		{$footer}
		</table>
		";

		/** create */
		return "
		<h2>{$this->_title}</h2>
		{$table}
		";
	}


	protected function _getHeader() : string
	{
//		$labels['person'] = "Persoon";
		$labels['team'] = "Team";
		$labels['year'] = "Jaar";

		$labels['c'] = "Caught";
		$labels['po'] = "Put out";
		$labels['a'] = "Attempts";
		$labels['e'] = "Errors";
		$labels['fld%'] = "Fielding percentage";
		$labels['dp'] = "Double plays";
		$labels['sba'] = "Stolen base percentage";
		$labels['csb'] = "Caught stealing";
		$labels['sba%'] = "Stolen base attempts percentage";
		$labels['pb'] = "Passed balls";
		$labels['ci'] = "Catcher's interference";
		
		$keys = array_keys($labels);

		$html = "<thead>
		<tr>
		";
		foreach ($keys as $key)
		{
			$html .= "<th scope='col'>{$key}</th>
			";
		}
		$html .= "
		</tr>
		</thead>
		";
		return $html;
	}


	protected function _getRows() : string
	{
		$html = "";
		foreach ($this->_collection as $item)
		{
			$html .= $item->showThumbnail();
		}

		return "
		<tbody>
			{$html}
		</tbody>
		";
	}


	protected function _getFooter()
	{
		return "
		<tr>
			<th scope='row'>Totaal</th>
			<td></td>
			<td>{$this->_totNrc}</td>
			<td>{$this->_totNrpo}</td>
			<td>{$this->_totNra}</td>
			<td>{$this->_totNre}</td>
			<td>{$this->_totNrfldperc}</td>
			<td>{$this->_totNrdp}</td>
			<td>{$this->_totNrsba}</td>
			<td>{$this->_totNrcsb}</td>
			<td>{$this->_totNrsbaperc}</td>
			<td>{$this->_totNrpb}</td>
			<td>{$this->_totNrci}</td>
		</tr>";
	}

	protected function _getTotals(array $row) : void
	{
		$row = $row['fielding'];

		$this->_totNrc += $row['caught'];
		$this->_totNrpo += $row['putOut'];
		$this->_totNra += $row['attempts'];
		$this->_totNre += $row['errors'];
		$this->_totNrdp += $row['doublePlays'];
		$this->_totNrsba += $row['stolenBaseAttempts'];
		$this->_totNrcsb += $row['caughtStealing'];
		$this->_totNrpb += $row['passedBalls'];
		$this->_totNrci += $row['catcherInterference'];

		/** calculated values */
		$this->_totNrfldperc = ($this->_totNrpo + $this->_totNra)/ $this->_totNrc;
		$this->_totNrfldperc = number_format($this->_totNrfldperc, 3, ',', ' ');


		if (is_numeric($this->_totNrsba) & is_numeric($this->_totNrcsb) & ($this->_totNrsba + $this->_totNrcsb) > 0)
		{
			$this->_totNrsbaperc = $this->_totNrsba / ($this->_totNrsba + $this->_totNrcsb);
			$this->_totNrsbaperc = number_format($this->_totNrsbaperc, 3, ',', ' ');
		} else {
			$this->_totNrsbaperc = "---";
		}
	}
}
?>