<?php
/**
 * todo update all the nravg in hitting to reflect .123 iso 0.123
 */

/* for testing purposes */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "ListView.php";
require_once "iListView.php";
require_once "HitterView.php";

class HittersView extends ListView implements iListView
{
	protected $_title = "Hitting";
	protected $_columnCount = 1;

	protected $_collection = [];

	/** totals */
	protected $_totNravg;
	protected $_totNrgp;
	protected $_totNrgs;
	protected $_totNrab;
	protected $_totNrr;
	protected $_totNrh;
	protected $_totNr2b;
	protected $_totNr3b;
	protected $_totNrhr;
	protected $_totNrrbi;
	protected $_totNrtb;
	protected $_totNrslgperc;
	protected $_totNrbb;
	protected $_totNrhbp;
	protected $_totNrso;
	protected $_totNrgdp;
	protected $_totNrobperc;
	protected $_totNrsf;
	protected $_totNrsh;
	protected $_totNrsb;
	protected $_totNratt;
	
	function __construct(array $rows)
	{
		parent::__construct();
		foreach ($rows as $row)
		{
			$this->_collection[] = new HitterView($row);
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
		$labels['avg'] = "Slaggemiddeld";
		$labels['gp'] = "Aantal wedstrijden gespeeld";
		$labels['gs'] = "Aantal wedstrijden gestart";
		$labels['ab'] = "aantal maal aan slag";
		$labels['r'] = "Runs";
		$labels['h'] = "Honkslagen";
		$labels['2b'] = "Tweehonkslagen";
		$labels['3b'] = "Driehonkslagen";
		$labels['hr'] = "Homeruns";
		$labels['rbi'] = "Binnengeslagen punten";
		$labels['tb'] = "Totaal aantal honken";
		$labels['slg%'] = "Aantal honken gemiddelde";
		$labels['bb'] = "4-wijd";
		$labels['hbp'] = "Geraakt werper";
		$labels['so'] = "3-slag";
		$labels['gdp'] = "In dubbelspel geslagen";
		$labels['obp'] = "Op de honken gemiddede";
		$labels['sf'] = "Sacrifice fly - ";
		$labels['sh'] = "Sacrifice hit -Oppoferingsslag";
		$labels['sb'] = "Stolen bases - gestolen honken";
		$labels['att'] = "Attempts - Steel pogingen";

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
			<td></td> 
			<td>{$this->_totNrgp}</td>
			<td>{$this->_totNrgs}</td>
			<td>{$this->_totNrab}</td>
			<td>{$this->_totNrr}</td>
			<td>{$this->_totNrh}</td>
			<td>{$this->_totNr2b}</td>
			<td>{$this->_totNr3b}</td>
			<td>{$this->_totNrhr}</td>
			<td>{$this->_totNrrbi}</td>
			<td>{$this->_totNrtb}</td>
			<td></td>
			<td>{$this->_totNrbb}</td>
			<td>{$this->_totNrhbp}</td>
			<td>{$this->_totNrso}</td>
			<td>{$this->_totNrgdp}</td>
			<td></td>
			<td>{$this->_totNrsf}</td>
			<td>{$this->_totNrsh}</td>
			<td>{$this->_totNrsb}</td>
			<td>{$this->_totNratt}</td>
		</tr>";
	}

	protected function _getTotals(array $row) : void
	{
		$row = $row['hitting'];

		/** summarize */
		$this->_totNravg += $row['battingAverage'];
		$this->_totNrgp += $row['gamesPlayed'];
		$this->_totNrgs += $row['gamesStarted'];
		$this->_totNrab += $row['atBats'];
		$this->_totNrr += $row['runs'];
		$this->_totNrh += $row['hits'];
		$this->_totNr2b += $row['doubles'];
		$this->_totNr3b += $row['triples'];
		$this->_totNrhr += $row['homeRuns'];
		$this->_totNrrbi += $row['runsBattedIn'];
		$this->_totNrtb += $row['totalBases'];
		$this->_totNrslgperc += $row['sluggingPercentage'];
		$this->_totNrbb += $row['baseOnBalls'];
		$this->_totNrhbp += $row['hitByPitch'];
		$this->_totNrso += $row['strikeOuts'];
		$this->_totNrgdp += $row['groundedIntoDoublePlay'];
		$this->_totNrobperc += $row['onBasePercentage'];
		$this->_totNrsf += $row['sacrificeFlies'];
		$this->_totNrsh += $row['sacrificeHits'];
		$this->_totNrsb += $row['stolenBases'];
		$this->_totNratt += $row['stealAttempts'];

		/** calculated values */
	}
}
?>