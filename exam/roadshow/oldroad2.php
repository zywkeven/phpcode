<?php
 set_time_limit(0); 

$flow=2000;

//initial---------------------------------
include("../conn/conn.php"); 
 
$cartotal=0; 

 $year=2008;
$month=8;
$day=24;

//$startdate=date("Y-M-d H:i:s",mktime(0,0,0,



$rate=0.05;

 for($day=24,$month=8;$day<=31;$day++)
 {
     $dayflow=0;
for($j=0;$j<24;$j++)
{ 
$passedday=$day-1;
$query_select="select * from new_table2 where year(timefield)='$year' and month(timefield)='$month'
and day(timefield)='$passedday' and hour(timefield)='$j'";  
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

$begintime=date("Y-m-d H:i:s",mktime($j,0,0,$month,$day,$year)); 
$endtime=date("Y-m-d H:i:s",mktime($j+1,0,0,$month,$day,$year)); 
$actualtime=$begintime; 

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
$date=date("Y-m-d H",mktime($j,0,0,$month,$day,$year));  
      
$passedday2=$passedday;
$query_select2="select * from new_table2 where year(timefield)='$year' and month(timefield)='$month'
and day(timefield)='$passedday2' and hour(timefield)='$j'";  
$result_select2=mysql_query($query_select2);
$row_select2=mysql_fetch_array($result_select2);
if ($row_select2[state]=='normal'||(!$row_select2[state]))
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
$date=date("Y-m-d H",mktime($j,0,0,$month,$day,$year));
 $query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','normal')";
 mysql_query($query_insert); 
 }
 
if($cartotal>($flow*(1+$rate)))
{ 
$date=date("Y-m-d H",mktime($j,0,0,$month,$day,$year));

$passedday2=$passedday;
$query_select2="select * from new_table2 where year(timefield)='$year' and month(timefield)='$month'
and day(timefield)='$passedday2' and hour(timefield)='$j'";  
$result_select2=mysql_query($query_select2);
$row_select2=mysql_fetch_array($result_select2);

$query_insert="insert into new_table2(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','over')"; 
 
 
 mysql_query($query_insert);
}
  $dayflow+=$cartotal; 
} 
  echo  $dayflow.'<br>';
}

 
 
















?>