<?php
require_once "iPageView.php";
require_once "PageView.php";

class HitterView extends PageView implements iPageView
{
	protected $_id;

	protected $_idteam;

	protected $_idperson;

	protected $_year;
	protected $_battingAverage;
	protected $_gamesPlayed;
	protected $_gamesStarted;
	protected $_atBats;
	protected $_runs;
	protected $_hits;
	protected $_doubles;
	protected $_triples;
	protected $_homeRuns;
	protected $_runsBattedIn;
	protected $_totalBases;
	protected $_sluggingPercentage;
	protected $_baseOnBalls;
	protected $_hitByPitch;
	protected $_strikeOuts;
	protected $_groundedIntoDoublePlay;
	protected $_onBasePercentage;
	protected $_sacrificeFlies;
	protected $_sacrificeHits;
	protected $_stolenBases;
	protected $_stealAttempts;

	function __construct(array $row)
	{
		if (empty($row) | !isset($row['hitting']) | !isset($row['hitting']['id']))
		{
			throw new InvalidArgumentException("Hitter is mandatory");
		}

		/** create the object */
		$hitter = $row['hitting'];

		$this->_id = $hitter['id'];

		$this->_idperson = $hitter['idperson'];

		$this->_idteam = $hitter['idteam'];

		$this->_year = $hitter['year'];
		$this->_battingAverage = $hitter['battingAverage'];
		$this->_gamesPlayed = $hitter['gamesPlayed'];
		$this->_gamesStarted = $hitter['gamesStarted'];
		$this->_atBats = $hitter['atBats'];
		$this->_runs = $hitter['runs'];
		$this->_hits = $hitter['hits'];
		$this->_doubles = $hitter['doubles'];
		$this->_triples = $hitter['triples'];
		$this->_homeRuns = $hitter['homeRuns'];
		$this->_runsBattedIn = $hitter['runsBattedIn'];
		$this->_totalBases = $hitter['totalBases'];
		$this->_sluggingPercentage = $hitter['sluggingPercentage'];
		$this->_baseOnBalls = $hitter['baseOnBalls'];
		$this->_hitByPitch = $hitter['hitByPitch'];
		$this->_strikeOuts = $hitter['strikeOuts'];
		$this->_groundedIntoDoublePlay = $hitter['groundedIntoDoublePlay'];
		$this->_onBasePercentage = $hitter['onBasePercentage'];
		$this->_sacrificeFlies = $hitter['sacrificeFlies'];
		$this->_sacrificeHits = $hitter['sacrificeHits'];
		$this->_stolenBases = $hitter['stolenBases'];
		$this->_stealAttempts = $hitter['stealAttempts'];
	}


	function show() : string
	{
		return "show";
		throw new exception("To be implemented");
	}


	function showThumbnail() : string
	{
		return "
			<tr>
				<th scope='row'>{$this->_idteam}</th>
				<td>{$this->_year}</td>
				<td>{$this->_battingAverage}</td>
				<td>{$this->_gamesPlayed}</td>
				<td>{$this->_gamesStarted}</td>
				<td>{$this->_atBats}</td>
				<td>{$this->_runs}</td>
				<td>{$this->_hits}</td>
				<td>{$this->_doubles}</td>
				<td>{$this->_triples}</td>
				<td>{$this->_homeRuns}</td>
				<td>{$this->_runsBattedIn}</td>
				<td>{$this->_totalBases}</td>
				<td>{$this->_sluggingPercentage}</td>
				<td>{$this->_baseOnBalls}</td>
				<td>{$this->_hitByPitch}</td>
				<td>{$this->_strikeOuts}</td>
				<td>{$this->_groundedIntoDoublePlay}</td>
				<td>{$this->_onBasePercentage}</td>
				<td>{$this->_sacrificeFlies}</td>
				<td>{$this->_sacrificeHits}</td>
				<td>{$this->_stolenBases}</td>
				<td>{$this->_stealAttempts}</td>
			</tr>
		";
	}
}
?>