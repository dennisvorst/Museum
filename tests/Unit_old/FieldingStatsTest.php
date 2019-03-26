<?php
//https://www.startutorial.com/articles/view/phpunit-beginner-part-1-get-started
require '..\class\FieldingStats.php';

class FieldingStatsTests extends PHPUnit_Framework_TestCase
{
    private $stats;
 
    protected function setUp()
    {
        $this->stats = new FieldingStats();
    }
 
    protected function tearDown()
    {
        $this->stats = NULL;
    }
 
    public function testFieldingPercentage()
    {
        $result = $this->stats->calcFieldingPercentage();
        $this->assertEquals(0.000 , $result);
    }
}