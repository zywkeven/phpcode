 <?php
 
 $actualtime1=date("Y-m-d H:i:s",mktime(0,0,0,1,1,1998));  
  
$actualtime=date("Y-m-d H:i:s",strtotime("$actualtime1 + 30 seconds"));
 
 echo date("Y-m-d H:i:s",strtotime("$actualtime - $actualtime1"));
 
 echo  date("Y-m-d H:i:s",mktime($actualtime - $actualtime1));
 
?>