<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SocialTest extends TestCase
{
    public function testClassSocial()
    {
        $this->assertTrue(class_exists("Social"));
    }
}
?>