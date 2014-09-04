<?php
 set_time_limit(0); 

$flow=1500;

//initial---------------------------------
include("../conn/conn.php"); 
 
$cartotal=0; 

$startyear=2008;
$startmonth=8;
$startday=24;

$endyear=2008;
$endmonth=9;
$endday=7; 

$startdate=date("Y-m-d H:i:s",mktime(0,0,0,$startmonth,$startday,$startyear));

$enddate=date("Y-m-d H:i:s",mktime(0,0,0,$endmonth,$endday,$endyear)); 
  
$rate=0.05;

$start=$startdate;

 for($start=$startdate;$start<=$enddate;$start=date("Y-m-d H:i:s",strtotime("$start+ 1 days")))
 {
 $dayflow=0;
 //1 day-----------------------------------------------------------------------------------
for($j=0;$j<24;$j++)
{
 
 $hourdesend=24-$j;  
 
$passedday=date("Y-m-d H:i:s",strtotime("$start -$hourdesend  hours")); 

$query_select="select * from new_table2 where timefield='$passedday'";  

$result_select=mysql_query($query_select);
$row_select=mysql_fetch_array($result_select); 
 
if($row_select[intervaltime]) 
$interval=$row_select[intervaltime];
else 
$interval=60;
 
if($row_select[redtime])
$redtime=$row_select[redtime];
else
$redtime=60; 

if($row_select[state]=='normal')
{  
}
else
if($row_select[state]=='over')
{   
    //$interval-=15;
    $redtime+=15;    
}
else
if($row_select[state]=='less')
{
    //$interval+=15;
    $redtime-=15; 
}


$cartotal=0; 

$begintime=date("Y-m-d H:i:s",strtotime("$start + $j hours")); 

$endj= $j+1;  
$endtime=date("Y-m-d H:i:s",strtotime("$start + $endj hours")); 

$actualtime=$begintime; 
 //1 hour----------------------------------------------------------------------
 //insert data to new_table;---------------------------------------------------
 
 
 while($actualtime<$endtime)
{   
    
 for($i=1;$i<=$interval/15;$i++)
 {     
$query="select * from new_table where roadtime='$actualtime'"; 
$result=mysql_query($query); 
 
while($row_result=mysql_fetch_array($result))
{
    $cartotal+=$row_result[numCar];
}
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + 15 seconds"));
} 

$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + $redtime seconds")); 
} 


if($cartotal<($flow*(1-$rate)))
 { 
  
 $date=date("Y-m-d H:i:s",strtotime("$start + $j hours"));
 
$passedday2=$passedday;

$query_select2="select * from new_table2 where timefield='$passedday2'"; 
 
$result_select2=mysql_query($query_select2);
$row_select2=mysql_fetch_array($result_select2);

if ($row_select2[redtime]<=60||(!$row_select2[redtime]))
{ 
$query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','normal')"; 
}

else
 $query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','less')";
 
 mysql_query($query_insert);
 }
 
 else
 if($cartotal>=($flow*(1-$rate))&&$cartotal<=($flow*(1+$rate)))
 {   
$date=date("Y-m-d H:i:s",strtotime("$start + $j hours"));

 $query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','normal')";
 mysql_query($query_insert); 
 }
 
if($cartotal>($flow*(1+$rate)))
{ 
$date=date("Y-m-d H:i:s",strtotime("$start + $j hours"));

$passedday2=$passedday;

$query_select2="select * from new_table2 where timefield='$passedday2'"; 
 
$result_select2=mysql_query($query_select2);
$row_select2=mysql_fetch_array($result_select2);

$query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','over')"; 
                      
 mysql_query($query_insert);
}
  $dayflow+=$cartotal; 
} 
  echo  $dayflow.'<br>';
}

$query_show="select * from new_table2";
$result_show=mysql_query($query_show);
echo '<table>';
 echo '<tr><td width=200>timefield</td><td width=100>flow</td><td>intervaltime</td><td>redtime</td><td>state</td></tr>'; 
    
while($row_show=mysql_fetch_array($result_show))
{
    echo '<tr><td>'.$row_show[timefield].'</td><td>'.$row_show[flow].'</td><td>'.$row_show[intervaltime].'</td><td>'.
    $row_show[redtime].'</td><td>'.$row_show[state].'</td></tr>'; 
}


 
 
















?>