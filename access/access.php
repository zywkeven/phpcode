<?php
header("Content-type:text/html; charset=utf-8");
$mdbFilename='db2.mdb';
$connectstring="Driver={Microsoft Access Driver (*.mdb)};Dbq=".realpath($mdbFilename);
//带有12345密码
$connection = odbc_connect($connectstring,'','12345',SQL_CUR_USE_ODBC);
echo "insert into tbltest(filed1)values('".urlencode("66").date('H:i:s')."')";
$gbk=iconv('utf-8','gbk',"在職在城在圾有遙許功蓋许功盖ノーマル.txt");
$query=odbc_do($connection,"insert into tbltest(filed1)values('".($gbk).date('H:i:s')."')");
$sql = "update tbltest set  filed1='".date('H:i:s')."' where mainkey=2";
$query = odbc_do( $connection, $sql);
//数据表名称 tbltest
$query=odbc_do($connection,"select * from tbltest");
echo '<br><br>';

while(odbc_fetch_row($query)){
    for($i=0;$i<2;$i++){
        echo $record1[$i] =iconv('gbk','utf-8', odbc_result($query,$i+1)); 
        echo " ";
        
    }
echo "<br>";
}
?>