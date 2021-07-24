<?php
require_once "iPageView.php";
require_once "PageView.php";

class FielderView extends PageView implements iPageView
{
	protected $_id;

	protected $_idperson;

	protected $_idteam;

	protected $_year;
	protected $_caught; // todo changes
	protected $_putOut;
	protected $_attempts; //todo assists
	protected $_errors;
	protected $_fieldingPercentage;
	protected $_doublePlays;
	protected $_stolenBaseAttempts;
	protected $_caughtStealing;
	protected $_stolenBaseAttemptPercentage;
	protected $_passedBalls;
	protected $_catcherInterference;
	

	function __construct(array $row)
	{
		if (empty($row) | !isset($row['fielding']) | !isset($row['fielding']['id']))
		{
			throw new InvalidArgumentException("Fielding is mandatory");
		}

		/** create the object */
		$fielding = $row['fielding'];

		$this->_id = $fielding['id'];
		$this->_idperson = $fielding['idperson'];
		$this->_idteam = $fielding['idteam'];

		$this->_year = $fielding['year'];
		$this->_caught = $fielding['caught'];
		$this->_putOut = $fielding['putOut'];
		$this->_attempts = $fielding['attempts'];
		$this->_errors = $fielding['errors'];
		$this->_fieldingPercentage = (is_numeric($fielding['fieldingPercentage']) ? number_format($fielding['fieldingPercentage'], 3, ',', ' ') : $fielding['fieldingPercentage']);
		$this->_doublePlays = $fielding['doublePlays'];
		$this->_stolenBaseAttempts = $fielding['stolenBaseAttempts'];
		$this->_caughtStealing = $fielding['caughtStealing'];
		$this->_stolenBaseAttemptPercentage = (is_numeric($fielding['stolenBaseAttemptPercentage']) ? number_format($fielding['stolenBaseAttemptPercentage'], 3, ',', ' ') : $fielding['stolenBaseAttemptPercentage']);
		$this->_passedBalls = $fielding['passedBalls'];
		$this->_catcherInterference = $fielding['catcherInterference'];
		
		
	}


	function show() : string
	{
		throw new exception("To be implemented");
	}


	function showThumbnail() : string
	{
		return "
			<tr>
				<th scope='row'>{$this->_idteam}</th>
				<td>{$this->_year}</td>
				<td>{$this->_caught}</td>
				<td>{$this->_putOut}</td>
				<td>{$this->_attempts}</td>
				<td>{$this->_errors}</td>
				<td>{$this->_fieldingPercentage}</td>
				<td>{$this->_doublePlays}</td>
				<td>{$this->_stolenBaseAttempts}</td>
				<td>{$this->_caughtStealing}</td>
				<td>{$this->_stolenBaseAttemptPercentage}</td>
				<td>{$this->_passedBalls}</td>
				<td>{$this->_catcherInterference}</td>
			</tr>
		";
	}
}
?>