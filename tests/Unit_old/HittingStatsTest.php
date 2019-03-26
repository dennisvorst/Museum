<?php
//https://www.startutorial.com/articles/view/phpunit-beginner-part-1-get-started
//https://www.sitepoint.com/testing-error-conditions-with-phpunit/
require '..\class\HittingStats.php';

class HittingStatsTests extends PHPUnit_Framework_TestCase
{
    private $stats;
	private $errors;
	
    protected function setUp()
    {
        $this->stats	= new HittingStats();
		$this->errors	= array();		
		set_error_handler(array($this, "errorHandler"));
    }
 
    protected function tearDown()
    {
        $this->stats = NULL;
    }
 
    public function errorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
        $this->errors[] = compact("errno", "errstr", "errfile",
            "errline", "errcontext");
    }
	
    public function assertError($errstr, $errno) {
        foreach ($this->errors as $error) {
            if ($error["errstr"] === $errstr
                && $error["errno"] === $errno) {
                return;
            }
        }
        $this->fail("Error with level " . $errno .
            " and message '" . $errstr . "' not found in ", 
            var_export($this->errors, TRUE));
    }


	/** tests */
	/** Batting Average */
    public function testBattingAverage()
    {
        $result = $this->stats->calcBattingAverage();
        $this->assertEquals("---" , $result);
    }

    public function testBattingAverage_OneHitOneAtBat()
    {
        $result = $this->stats->calcBattingAverage(1, 1);
        $this->assertEquals("1.000" , $result);
    }

    public function testBattingAverage_OneHitTwoAtBats()
    {
        $result = $this->stats->calcBattingAverage(1, 2);
        $this->assertEquals("0.500" , $result);
    }

	/** Slugging Percentage */
    public function testSluggingPercentage()
    {
        $result = $this->stats->calcSluggingPercentage();
        $this->assertEquals(0.000 , $result);
    }


	/** On Base Percentage */
    public function testOnBasePercentage()
    {
        $result = $this->stats->calcOnBasePercentage();
        $this->assertEquals(0.000 , $result);
    }
}