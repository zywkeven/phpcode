<?php
include("../conn/conn.php");
 set_time_limit(0); 
 $year=2008;
 $date=9;
 $month=9;
 
for($i=0;$i<=21600;$i+=15)
{
$roadtime=date("Y-m-d H:i:s",mktime(0,0,$i,$month,$date,$year)); 
$numCar=rand(0,10);
$query="insert into new_table(roadtime,numCar) values('$roadtime','$numCar')";
mysql_query($query);
}

for($i=0;$i<=21600;$i+=15)
{
$roadtime=date("Y-m-d H:i:s",mktime(6,0,$i,$month,$date,$year)); 
$numCar=rand(0,50);
$query="insert into new_table(roadtime,numCar) values('$roadtime','$numCar')";
mysql_query($query);
}

for($i=0;$i<=21600;$i+=15)
{
$roadtime=date("Y-m-d H:i:s",mktime(12,0,$i,$month,$date,$year)); 
$numCar=rand(0,50);
$query="insert into new_table(roadtime,numCar) values('$roadtime','$numCar')";
mysql_query($query);
}

for($i=0;$i<=21600;$i+=15)
{
$roadtime=date("Y-m-d H:i:s",mktime(18,0,$i,$month,$date,$year)); 
$numCar=rand(0,30);
$query="insert into new_table(roadtime,numCar) values('$roadtime','$numCar')";
mysql_query($query);
}



?>