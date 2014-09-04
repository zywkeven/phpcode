<?php
 set_time_limit(0);
  include("../../conn/conn.php"); 
//initial---------------------------------  
                        
$flow=$_POST[flow]; 
 $str1=$_POST[date1];
 $array1=split('-',$str1);

$str2=$_POST[date2];
 $array2=split('-',$str2);

$rate=$_POST[rate]/100;  

$initialinterval=$_POST[interval];

$initialredtime=15;

$lowredtime=1;

$startdate=date("Y-m-d H:i:s",mktime(0,0,0,$array1[1],$array1[2],$array1[0]));

$enddate=date("Y-m-d H:i:s",mktime(0,0,0,$array2[1],$array2[2],$array2[0])); 
  

$cartotal=0; 
$start=$startdate;

 for($start=$startdate;$start<=$enddate;$start=date("Y-m-d H:i:s",strtotime("$start+ 1 days")))
 {
 $dayflow=0;
 //1 day-----------------------------------------------------------------------------------
          
for($j=0;$j<24;$j++)
{   
 $hourdesend=24-$j; 
 
$passedday=date("Y-m-d H:i:s",strtotime("$start -$hourdesend  hours")); 

$query_select="select * from road_control where timefield='$passedday'";  

$result_select=mysql_query($query_select);
$row_select=mysql_fetch_array($result_select); 
 
if($row_select[intervaltime]) 
$interval=$row_select[intervaltime];
else 
$interval=$initialinterval;
 
if($row_select[redtime])
$redtime=$row_select[redtime];
else
$redtime=$initialredtime; 
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
   // $interval+=15;
    $redtime-=15; 
    if($redtime<15)
     $redtime=15;
} 
//insert date----------------------------------------------------------------------------------------------------
 for($i=0;$i<=3600;$i+=15)
{  
$addhour=date("Y-m-d H:i:s",strtotime("$start+ $j hours"));  
  
$roadtime=date("Y-m-d H:i:s",strtotime("$addhour+ $i seconds"));  

$gethour=date("H",strtotime("$roadtime"));

if($gethour<6)
$numCar=rand(0,20);
if($gethour>=6&&$gethour<12)
$numCar=rand(0,50);
if($gethour>=12&&$gethour<18)
$numCar=rand(0,50);
if($gethour>=18)
$numCar=rand(0,30); 
$query="insert into road_details(roadtime,numCar) values('$roadtime','$numCar')";
mysql_query($query); 
} 

$cartotal=0; 

$begintime=date("Y-m-d H:i:s",strtotime("$start + $j hours")); 

$endj= $j+1;  
$endtime=date("Y-m-d H:i:s",strtotime("$start + $endj hours")); 

$actualtime=$begintime; 
 //1 hour----------------------------------------------------------------------
 
 $counterredtime=0;
 
if($lastredtime||$lastredtime!=0) 
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + $lastredtime seconds")); 
  
 while($actualtime<$endtime)
{   
  $counterredtime++; 
  
 for($i=1;$i<=$interval/15;$i++)
 {     
$query="select * from road_details where roadtime='$actualtime'"; 
$result=mysql_query($query); 
 
while($row_result=mysql_fetch_array($result))
{
    $cartotal+=$row_result[numCar];
}

$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + 15 seconds")); 

} 
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + $redtime seconds"));  

if($actualtime>$endtime) 
{
  $lastredtime=$redtime+$interval-($counterredtime*($redtime+$interval)-3600);
  
}  
else
{
    $lastredtime=0;
}
  
} 

//insert into road_control----------------------------------------------------------------------------------------
if($cartotal<($flow*(1-$rate)))
 { 
 
 $date=date("Y-m-d H:i:s",strtotime("$start + $j hours"));  

if ($redtime<=$lowredtime)
{ 
$query_insert="insert into road_control(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','normal')"; 
} 
else
 $query_insert="insert into road_control(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','less')"; 
 mysql_query($query_insert); 
 } 
 else
 if($cartotal>=($flow*(1-$rate))&&$cartotal<=($flow*(1+$rate)))
 {   
$date=date("Y-m-d H:i:s",strtotime("$start + $j hours"));

 $query_insert="insert into road_control(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','normal')";
 mysql_query($query_insert); 
 }
 
if($cartotal>($flow*(1+$rate)))
{ 
$date=date("Y-m-d H:i:s",strtotime("$start + $j hours")); 

$query_insert="insert into road_control(timefield,flow,intervaltime,redtime,state) values('$date','$cartotal','$interval','$redtime','over')"; 
                      
 mysql_query($query_insert);
}
  $dayflow+=$cartotal; 
} 
 // echo  $dayflow.'<br>';
}  

?>