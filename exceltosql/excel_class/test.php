<?php
//sheet名 就是当你打开一个xls文件时，在左下角会有一个sheet名。这个是一定要指定的
require "excel_class.php";

Read_Excel_File("Book.xls",$return);

for ($i=0;$i<count($return['Sheet1']);$i++)
{
	for ($j=0;$j<count($return['Sheet1'][$i]);$j++)
	{
		echo $return['Sheet1'][$i][$j]."\t";
	}
	echo "<br>";
}
?>
