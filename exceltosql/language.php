<?php  
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");  
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=11.xls ");  
header("Content-Transfer-Encoding: binary ");  
?>  
<?  
$filename="php导入到excel-utf-8编码";  
$filename=iconv("utf-8", "gb2312", $filename);  
echo $filename;  
?> 

gbk编码案例

<?php  
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");  
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=11.xls ");  
header("Content-Transfer-Encoding: binary ");  
?>  
<?  
$filename="php导入到excel-utf-8编码";  
echo $filename;  
?> 

访问网站的时候就
