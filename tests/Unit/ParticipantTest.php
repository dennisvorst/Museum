<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ParticipantTest extends TestCase
{
    public function testClassParticipantExists()
    {
        $this->assertTrue(class_exists("Participant"));
    }
}
?>