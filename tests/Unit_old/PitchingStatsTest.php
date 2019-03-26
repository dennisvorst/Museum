<?php
//https://www.startutorial.com/articles/view/phpunit-beginner-part-1-get-started
require '..\class\PitchingStats.php';

class PitchingStatsTests extends PHPUnit_Framework_TestCase
{
    private $stats;
 
    protected function setUp()
    {
        $this->stats = new PitchingStats();
    }
 
    protected function tearDown()
    {
        $this->stats = NULL;
    }

    public function testEarnedRunAverage()
    {
        $result = $this->stats->calcEarnedRunAverage();
        $this->assertEquals(0.000 , $result);
    }

    public function testOpponentAverage()
    {
        $result = $this->stats->calcOpponentAverage();
        $this->assertEquals(0.000 , $result);
    }
}