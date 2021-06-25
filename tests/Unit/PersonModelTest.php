<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PersonModelTest extends TestCase
{
	public function testClassPersonModelExists()
    {
        $this->assertTrue(class_exists("PersonModel"));
    }
}