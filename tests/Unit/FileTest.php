<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testClassExcelExists()
    {
        $this->assertTrue(class_exists("File"));
    }

    /*
    public function testClassAcceptsValidFileName()
    {
        $this->assertTrue(False);
    }

    public function testClassDoesNotAcceptInvalidFilename()
    {
        $this->assertTrue(False);
    }
*/
    /* getUploadFolder */
    /*
    public function testGetUploadFolderReturnsValue()
    {
//        $object = new File("someFile");
//        $expected = "../upload/";
//        $this->assertEquals($expected, $object->getUploadFolder($expected));
        $this->assertTrue(true);
    }
*/
    /* getDownloadFolder */
    /*
    public function testGetDownloadFolderReturnsValue()
    {
//        $object = new File("someFile");
//        $expected = "../download/";
//        $this->assertEquals($expected, $object->getDownloadFolder($expected));
        $this->assertTrue(true);
    }
    */
}
?>