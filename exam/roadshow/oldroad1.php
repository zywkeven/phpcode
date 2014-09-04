<?php

$flow=100;
//initial---------------------------------
include("../conn/conn.php");  

$interval=15;
$redtime=20;

$begintime=date("Y-m-d H:i:s",mktime(0,0,0,8,23,2008));

$endtime=date("Y-m-d H:i:s",mktime(0,16,40,8,23,2008));

$actualtime=$begintime;

$cartotal=0;
$timetotal=0;
$redtotal;
$counter=0;
$unchangedinterval=15;
$crossedcar=0; 

echo '<table height=5 border=1>'; 
echo '<tr><td>actualtime:'.$actualtime.'</td><td>redtime:'.'&nbsp;
</td><td>interval:'.$interval.'</td><td>the crossed car number:'.'</td></tr>';  

while($actualtime<=$endtime)
{ 
$crossedcar=0;  

 for($i=1;$i<=($interval/15);$i++)
 {  
 $addsecond=$unchangedinterval*($i-1);
 if($i==1)
 $middletime=$actualtime;
 else  
$middletime=date("Y-m-d H:i:s",strtotime("$actualtime + $addsecond seconds"));
$query="select * from new_table where roadtime='$middletime'"; 
$result=mysql_query($query); 
while($row_result=mysql_fetch_array($result))
{
    $crossedcar+=$row_result[numCar];
} 
}  
 
//totaltime--------------------------------------------------- 
$counter++; 

if($counter%2==0)
{
$timetotal+=$redtime; 
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + $redtime seconds"));
}
else
{ 
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime + $interval seconds")); 
$timetotal+=$interval;
} 

$cartotal+=$crossedcar;

 //define interval and readtime-------------------------------------------------

 if($counter%2!=0)
{
 if(($lastflow=($crossedcar/($interval/15)*(60/($interval+$redtime))))<$flow)
{
    if(($cartotal*60/$timetotal)<$flow)
     {
      $interval+=15;
      
    //  $redtime=intval(15*60*$crossedcar/($interval*($timetotal*$flow/60-$cartotal+$lastflow))-$interval);
         $redtime-=($timetotal*$flow/60-$cartotal)/$lastflow;
         
      if($redtime<3)
    {
        $redtime=3;
    } 
     }
     else 
     {
    $interval-=15;
    
    if($interval<=0)
      {
          $interval=15;
      } 
   //  $redtime=intval(15*60*$crossedcar/($interval*($lastflow-($cartotal-$timetotal*$flow/60)))-$interval); 
      
    if($redtime<3)
    {
        $redtime=3;
    }
     } 
} 

if(($lastflow=($crossedcar/($interval/15)*(60/($interval+$redtime)>$flow))))
{
    if(($cartotal*60/$timetotal)<$flow)
     {
      $interval+=15;
      
      if($interval<=0)
      {
          $interval=15;
      } 
     // $redtime=intval(15*60*$crossedcar/($interval*($timetotal*$flow/60-$cartotal+$lastflow))-$interval); 
         
       if($redtime<3)
    {
        $redtime=3;
    }
    
     }
     else 
     {
         
    $interval-=15;
     if($interval<=0)
      {
          $interval=15;
      }
 //  $redtime=intval(15*60*$crossedcar/($interval*($lastflow-($cartotal-$timetotal*$flow/60)))-$interval); 
      
    if($redtime<3)
    {
        $redtime=3;
    }
     } 
}
}
//-------------------end defind------------------------------------------

if($counter%2!=0)
{
echo '<tr><td>actualtime:'.$actualtime.'</td><td>redtime:'.$redtime.'
</td><td>interval:'.$interval.'</td><td>the crossed car number:'.$crossedcar.'</td></tr>';

}
}

echo $cartotal.'  ';
echo $timetotal;













?>