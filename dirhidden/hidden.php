<?php
$image_path="images/";
$image_file=$image_path.$_GET['name'];
$sTmpVar = fread(fopen($image_file, 'r'), filesize($image_path));
header("Content-type: image/* ");
echo $sTmpVar;
echo 'aaa';
?>