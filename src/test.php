<?php
error_reporting(E_ALL);

require '../vendor/autoload.php';
require_once 'class/HtmlTable.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Helper\Sample;

/** load the excel file  */
$reader = IOFactory::createReaderForFile("upload/honkbal hoofdklasse holland series.xlsx");
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("upload/honkbal hoofdklasse holland series.xlsx");

$worksheet = $spreadsheet->getActiveSheet();

// idgame = null
// idcompetition = the one on this page
// idhome to be determined based on column with title idhome
// idaway to be determined based on column with title idaway 
// nrgame 
// dtstart 
// tmstart
// nrrunshome
// nrrunsaway
// nrinnings
// cdstatus Status
// dtnew
// created_at
// updated_by	
// updated_at


$columns = ['dtstart', 'idhome', 'idaway', 'nrrunshome', 'nrrunsaway', 'nrgame'];

/** the first colume must contain all columns */
$rows = [];
foreach ($worksheet->getRowIterator() as $row) {

  $cellIterator = $row->getCellIterator();
  /** This loops through all cells, even if a cell value is not set. By default, only cells that have a value set will be iterated. */  
  $cellIterator->setIterateOnlyExistingCells(FALSE); 
  $cells = [];
  foreach ($cellIterator as $cell) {
    $cells[] = $cell->getValue();
  }  
  $rows[] = $cells;
  unset($cells);
}

/** compare the columns */
$titles = $rows[0];
sort($titles);

$sortedColumns = $columns;
sort($sortedColumns);

if ($titles != $sortedColumns)
{  
  /** the columns do not match with what is mandatory */
  echo "<h1>the columns do not match with what is mandatory</h1>"; 
  return;
}
/** get the rows */

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Wedstrijden</title>
  </head>
  <body>
    <h1>Wedstrijden</h1>

    <?php
    /** turn them into a table */
    $table = new HtmlTable();
    foreach ($rows as $row)
    {
      $table->addRow(new HtmlTableRow($row));
    }
    echo $table->getElement();
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>