<?php

$excel = new COM("excel.application") or die("Unable to instanciate excel"); 
print "Loaded excel, version {$excel->Version}\n"; 


$excel->DisplayAlerts = 0; 


$path=realpath('./BD00001.xls');
$excel->Workbooks->Open($path); 

$excel->Workbooks[1]->SaveAs("c:\\App\\227\\abc.csv",6); 


$excel->Quit(); 


//$excel->Release(); 
$excel = null; 
?> 