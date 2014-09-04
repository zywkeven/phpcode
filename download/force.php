<?php
$filename = "/somepath/".$_GET['file'].".txt";   //要下载的文件名
 
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".basename($filename)); 
readfile($filename);
 
?>