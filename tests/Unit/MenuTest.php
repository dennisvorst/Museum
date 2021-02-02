<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    public function testClassMenuExists()
    {
        $this->assertTrue(class_exists("Menu"));
    }

    public function testClassFieldingCanBeInstatiated()
    {
		$object = new Menu();
		$this->assertInstanceOf(Menu::class, $object);	
    }
    
    public function testClassMenuHomeIsActive()
    {
        $object = new Menu();
        $expected = "<div>Versie: 1.0.0</div>\n<ul class='nav flex-column'>\n<li class='nav-item'><a class='nav-link active' aria-current='page' href='index.php?nmclass=home'>Home</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=articles'>Artikelen</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=photos'>Foto's</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=videos'>Video's</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=clubs'>Clubs</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=persons'>Personen</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=halloffamers'>Eregalerij</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=competitions'>Competities</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=contact'>Contact</a></li>\n</ul>\n";

        $actual = $object->getMainMenu();
    
        $this->assertIsString($actual);
		$this->assertEquals($actual, $expected);	
    }

    public function testClassMenuArticlesIsActive()
    {
        $object = new Menu();
        $expected = "<div>Versie: 1.0.0</div>\n<ul class='nav flex-column'>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=home'>Home</a></li>\n<li class='nav-item'><a class='nav-link active' aria-current='page' href='index.php?nmclass=articles'>Artikelen</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=photos'>Foto's</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=videos'>Video's</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=clubs'>Clubs</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=persons'>Personen</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=halloffamers'>Eregalerij</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=competitions'>Competities</a></li>\n<li class='nav-item'><a class='nav-link' aria-current='page' href='index.php?nmclass=contact'>Contact</a></li>\n</ul>\n";

        $actual = $object->getMainMenu("articles");
    
        $this->assertIsString($actual);
		$this->assertEquals($actual, $expected);	
    }

}
?>