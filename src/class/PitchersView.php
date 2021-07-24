<?php
/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "ListView.php";
require_once "iListView.php";
require_once "PitcherView.php";

class PitchersView extends ListView implements iListView
{
	protected $_title = "Pitching";
	protected $_columnCount = 1;

	protected $_collection = [];

	/** totals */
	protected $_totNrw = 0;
	protected $_totNrl = 0;
	protected $_totNrapp = 0;
	protected $_totNrgs = 0;
	protected $_totNrcg = 0;
	protected $_totNrsho = 0;
	protected $_totNrsv = 0;
	protected $_totNrip = 0;
	protected $_totNrh = 0;
	protected $_totNrr = 0;
	protected $_totNrer = 0;
	protected $_totNrbb = 0;
	protected $_totNrso;
	protected $_totNr2b;
	protected $_totNr3b;
	protected $_totNrhr;
	protected $_totNrab;
//	protected $_totNroppavg
	protected $_totNrwp;
	protected $_totNrhbp;
	protected $_totNrbk;
//	protected $_totNrera
	


	function __construct(array $rows)
	{
		parent::__construct();
		foreach ($rows as $row)
		{
			$this->_collection[] = new PitcherView($row);
			$this->_getTotals($row);
		}
	}


	function show() : string
	{
		return "
		<h2>{$this->_title}</h2>
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

		/** todo replace the year texts */
		$labels['w'] = "Jaar";
		$labels['l'] = "Jaar";
		$labels['app'] = "Jaar";
		$labels['gs'] = "Jaar";
		$labels['cg'] = "Jaar";
		$labels['sho'] = "Jaar";
		$labels['sv'] = "Jaar";
		$labels['ip'] = "Jaar";
		$labels['h'] = "Jaar";
		$labels['r'] = "Jaar";
		$labels['er'] = "Jaar";
		$labels['bb'] = "Jaar";
		$labels['so'] = "Jaar";
		$labels['2b'] = "Jaar";
		$labels['3b'] = "Jaar";
		$labels['hr'] = "Jaar";
		$labels['ab'] = "Jaar";
		$labels['oppavg'] = "Jaar";
		$labels['wp'] = "Jaar";
		$labels['hbp'] = "Jaar";
		$labels['bk'] = "Jaar";
		$labels['era'] = "Jaar";

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
		/** collect */
		$this->_totNrip = (is_numeric($this->_totNrip) ? number_format($this->_totNrip, 1, ',', ' ') : $this->_totNrip);

		/** create */
		return "
		<tr>
			<th scope='row'>Totaal</th>
			<td></td>
			<td class='text-end'>{$this->_totNrw}</td>
			<td class='text-end'>{$this->_totNrl}</td>

			<td class='text-end'>{$this->_totNrapp}</td>
			<td class='text-end'>{$this->_totNrgs}</td>
			<td class='text-end'>{$this->_totNrcg}</td>
			<td class='text-end'>{$this->_totNrsho}</td>
			<td class='text-end'>{$this->_totNrsv}</td>
			<td class='text-end'>{$this->_totNrip}</td>
			<td class='text-end'>{$this->_totNrh}</td>
			<td class='text-end'>{$this->_totNrr}</td>
			<td class='text-end'>{$this->_totNrer}</td>
			<td class='text-end'>{$this->_totNrbb}</td>
			<td class='text-end'>{$this->_totNrso}</td>
			<td class='text-end'>{$this->_totNr2b}</td>
			<td class='text-end'>{$this->_totNr3b}</td>
			<td class='text-end'>{$this->_totNrhr}</td>
			<td class='text-end'>{$this->_totNrab}</td>
			<td class='text-end'></td>
			<td class='text-end'>{$this->_totNrwp}</td>
			<td class='text-end'>{$this->_totNrhbp}</td>
			<td class='text-end'>{$this->_totNrbk}</td>
			<td class='text-end'></td>
		</tr>";

		/** 
		 * todo implement ERA calculation
		 * todo align right for all numeric values 
		 */
	}

    protected function _getTotals(array $row) : void
	{
		$row = $row['pitching'];
		$this->_totNrw		+=	$row['wins'];
		$this->_totNrl		+=	$row['losses'];
		$this->_totNrapp	+=	$row['appearences'];
		$this->_totNrgs		+=	$row['gamesStarted'];
		$this->_totNrcg		+=	$row['completeGames'];
		$this->_totNrsho	+=	$row['shutOuts'];
		$this->_totNrsv		+=	$row['saves'];
		$this->_totNrip		+=	$row['inningsPitched'];
		$this->_totNrh		+=	$row['hits'];
		$this->_totNrr		+=	$row['runs'];
		$this->_totNrer		+=	$row['earnedRuns'];
		$this->_totNrbb		+=	$row['baseOnBalls'];
		$this->_totNrso		+=	$row['strikeOuts'];
		$this->_totNr2b		+=	$row['doubles'];
		$this->_totNr3b		+=	$row['triples'];
		$this->_totNrhr		+=	$row['homeRuns'];
		$this->_totNrab		+=	$row['atBats'];
		$this->_totNrwp		+=	$row['wildPitches'];
		$this->_totNrhbp	+=	$row['hitByPitch'];
		$this->_totNrbk		+=	$row['balks'];
	}

}
?>