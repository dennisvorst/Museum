<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SourceTest extends TestCase
{
    public function testClassSourceExists()
    {
        $this->assertTrue(class_exists("Source"));
    }

    public function testShowThumbnailWithoutHyperlink()
    {
        $json['id'] = 1;
        $json['nmsearch'] = "searchname";
        $json['nmsource'] = "sourcename";
        
        $json = json_encode($json);

        $object = new SourceView($json);
        $actual = $object->showThumbnail();
        $expected = "sourcename";
        
        $this->assertIsString($actual);
        $this->assertEquals($actual, $expected);
    }

    public function testShowThumbnailWithHyperlink()
    {
        $json['id'] = 1;
        $json['nmsearch'] = "searchname";
        $json['nmsource'] = "sourcename";
        $json['ftwebsite'] = "website";
        
        $json = json_encode($json);

        $object = new SourceView($json);
        $actual = $object->showThumbnail();
        $expected = "<a href='website' target='_new' >sourcename</a>";
        
        $actual = $object->showThumbnail();

        $this->assertIsString($actual);
        $this->assertEquals($actual, $expected);
        
    }

    public function testShow()
    {
        $json['id'] = 1;
        $json['nmsearch'] = "searchname";
        $json['nmsource'] = "sourcename";
        $json['ftwebsite'] = "website";
        
        $json = json_encode($json);

        $object = new SourceView($json);
        $actual = $object->showThumbnail();
        $expected = "<img border='0' src='./images/sources/searchname.jpg'>";
        
        $actual = $object->show();

        $this->assertIsString($actual);
        $this->assertEquals($actual, $expected);
        
    }

}
?>