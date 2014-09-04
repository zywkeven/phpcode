<?php 
include("../conn/conn.php");

$str1=$_POST[date1];
 $array1=split('-',$str1);

$str2=$_POST[date2];
 $array2=split('-',$str2);

 $startdate=date("Y-m-d H:i:s",mktime(0,0,0,$array1[1],$array1[2],$array1[0]));

$enddate=date("Y-m-d H:i:s",mktime(0,0,0,$array2[1],$array2[2],$array2[0])); 

$query_show="select * from road_control where timefield>='$startdate' and timefield<='$enddate'";

$result_show=mysql_query($query_show);
echo '<table border=1>';
 echo '<tr><td width=200>timefield</td><td width=100>flow</td><td>intervaltime</td><td>redtime</td><td>state</td></tr>'; 
    
while($row_show=mysql_fetch_array($result_show))
{
    echo '<tr><td>'.$row_show[timefield].'</td><td>'.$row_show[flow].'</td><td>'.$row_show[intervaltime].'</td><td>'.
    $row_show[redtime].'</td><td>'.$row_show[state].'</td></tr>'; 
}
echo '</table>';