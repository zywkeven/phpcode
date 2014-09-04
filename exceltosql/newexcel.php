<?php
$workbook = "./BD00001.xls"; 
$sheet = "Sheet1"; 
$ex = new COM('Excel.sheet') or Die ("连不上！！！");                 

$book = $ex->application->Workbooks->Open($workbook) or Die ("打不开！！！"); 
  
$sheets = $book->Worksheets($sheet);
$sheets->activate; 


$cell = $sheets->Cells(2,2);
$cell->activate;

$cell->value = 999;

				 
$ex->Application->ActiveWorkbook->SaveAs("C:\\App\\227\\test4.txt",-4158); 
$ex->application->ActiveWorkbook->Close("False"); 
unset ($ex); 

?> 
