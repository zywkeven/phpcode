 <meta http-equiv="Content-Type" content="text/html; charset=big-5">  
 
<?php
 /* ½m*/

	  
	$temp=file("./test3.txt");

for ($i=0;$i<count($temp);$i++) 
{ 
$string=explode("\t",$temp[$i]);  
$stringnext=explode("\t",$temp[$i+1]); 
foreach($stringnext as $name)
{
echo $name.'<br>';       
}
unset($string); 
unset($stringnext);
echo '<br>';
}

  
 

?>   