<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ParticipantsViewTest extends TestCase
{
    public function testClassParticipantsView()
    {
        $this->assertTrue(class_exists("ParticipantsView"));
    }
}
?>