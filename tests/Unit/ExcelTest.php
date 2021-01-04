<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelTest extends TestCase
{
    public function testClassExcelExists()
    {
        $this->assertTrue(class_exists("Excel"));
    }

    function testGetAndSetContentRoundtripWorks()
    {
        $object = new Excel();
        $expected = ["Title" => "SomeTitle"];
        $object->setContent(["Title" => "SomeTitle"]);
        $this->assertEquals($expected, $object->getContent());
    }

    /*
    function testTurnExcelFileIntoTableWorks()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("files\test.xlsx");
    }
    */

    // function testTurnExcelFileIntoTableWorks()
    // {
        
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Hello World !');
        
    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save('C:\\inetpub\\htdocs\\Museum\\tests\\Unit\\hello world.xlsx');        
    // }
}
?>