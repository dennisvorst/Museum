<?php
/**
 * todo remove the leading 0 from the oppavg in the pitching database 
 */
require_once "iPageView.php";
require_once "PageView.php";

class PitcherView extends PageView implements iPageView
{
	protected $_id;
	protected $_idperson;
	protected $_idteam;

	protected $_year;
	protected $_wins;
	protected $_losses;
	protected $_appearences;
	protected $_gamesStarted;
	protected $_completeGames;
	protected $_shutOuts;
	protected $_saves;
	protected $_inningsPitched;
	protected $_hits;
	protected $_runs;
	protected $_earnedRuns;
	protected $_baseOnBalls;
	protected $_strikeOuts;
	protected $_doubles;
	protected $_triples;
	protected $_homeRuns;
	protected $_atBats;
	protected $_opponentAverage;
	protected $_wildPitches;
	protected $_hitByPitch;
	protected $_balks;
	protected $_earnedRunAverage;

	function __construct(array $row)
	{
		if (empty($row) | !isset($row['pitching']) | !isset($row['pitching']['id']))
		{
			throw new InvalidArgumentException("Pitching is mandatory");
		}

		/** create the object */
		$pitcher = $row['pitching'];

		$this->_id = $pitcher['id'];

		$this->_idperson = $pitcher['idperson'];
		$this->_idteam = $pitcher['idteam'];
		$this->_year = $pitcher['year'];
		$this->_wins = $pitcher['wins'];
		$this->_losses = $pitcher['losses'];
		$this->_appearences = $pitcher['appearences'];
		$this->_gamesStarted = $pitcher['gamesStarted'];
		$this->_completeGames = $pitcher['completeGames'];
		$this->_shutOuts = $pitcher['shutOuts'];
		$this->_saves = $pitcher['saves'];
		$this->_inningsPitched = $pitcher['inningsPitched'];
		$this->_hits = $pitcher['hits'];
		$this->_runs = $pitcher['runs'];
		$this->_earnedRuns = $pitcher['earnedRuns'];
		$this->_baseOnBalls = $pitcher['baseOnBalls'];
		$this->_strikeOuts = $pitcher['strikeOuts'];
		$this->_doubles = $pitcher['doubles'];
		$this->_triples = $pitcher['triples'];
		$this->_homeRuns = $pitcher['homeRuns'];
		$this->_atBats = $pitcher['atBats'];
		$this->_opponentAverage = $pitcher['opponentAverage'];
		$this->_wildPitches = $pitcher['wildPitches'];
		$this->_hitByPitch = $pitcher['hitByPitch'];
		$this->_balks = $pitcher['balks'];
		$this->_earnedRunAverage = (is_numeric($pitcher['earnedRunAverage']) ? number_format($pitcher['earnedRunAverage'], 2, ',', ' ') : $pitcher['earnedRunAverage']);
	}


	function show() : string
	{
		throw new exception("To be implemented");
	}


	function showThumbnail() : string
	{
		/** collect */
		$this->_inningsPitched = (is_numeric($this->_inningsPitched) ? number_format($this->_inningsPitched, 1, ',', ' ') : $this->_inningsPitched);

		/** create */
		return "
			<tr>
				<th scope='row'>{$this->_idteam}</th>
				<td>{$this->_year}</td>
				<td class='text-end'>{$this->_wins}</td>
				<td class='text-end'>{$this->_losses}</td>
				<td class='text-end'>{$this->_appearences}</td>
				<td class='text-end'>{$this->_gamesStarted}</td>
				<td class='text-end'>{$this->_completeGames}</td>
				<td class='text-end'>{$this->_shutOuts}</td>
				<td class='text-end'>{$this->_saves}</td>
				<td class='text-end'>{$this->_inningsPitched}</td>
				<td class='text-end'>{$this->_hits}</td>
				<td class='text-end'>{$this->_runs}</td>
				<td class='text-end'>{$this->_earnedRuns}</td>
				<td class='text-end'>{$this->_baseOnBalls}</td>
				<td class='text-end'>{$this->_strikeOuts}</td>
				<td class='text-end'>{$this->_doubles}</td>
				<td class='text-end'>{$this->_triples}</td>
				<td class='text-end'>{$this->_homeRuns}</td>
				<td class='text-end'>{$this->_atBats}</td>
				<td class='text-end'>{$this->_opponentAverage}</td>
				<td class='text-end'>{$this->_wildPitches}</td>
				<td class='text-end'>{$this->_hitByPitch}</td>
				<td class='text-end'>{$this->_balks}</td>
				<td class='text-end'>{$this->_earnedRunAverage}</td>
			</tr>
		";
	}
}
?>