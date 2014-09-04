<meta charset='utf-8'>
<table align=center border=0 cellspacing=0 cellpadding=0> 
<? 
for ($y=0;$y<16;$y++) 
{ 
echo "<tr height=4>n"; 

for ($x=0;$x<16;$x++) 
{ 
$abs00=sqrt(($x*$x)+($y*$y)); 
if ($abs00>16) 
$abs00=16; 

$abs01=sqrt(($x*$x)+((16-$y)*(16-$y))); 
if ($abs01>16) 
$abs01=16; 

$abs10=sqrt(((16-$x)*(16-$x))+($y*$y)); 
if ($abs10>16) 
$abs10=16; 

$red=((16-$abs00)*16)-1; 
if ($red<0) 
$red=0; 

$green=((16-$abs01)*16)-1; 
if ($green<0) 
$green=0; 
$blue= ((16-$abs10)*16)-1; 
if ($blue<0) 
$blue=0; 

$col = sprintf("%02x%02x%02x",$red,$green,$blue); 
echo '<td width=4 bgcolor="#$col">($red,$green,$blue=$col)<a href="$PHP_SELF?color=$col"><img src=images/blank.gif width=4 height=4 border=0 alt="$col"></a></td>n';
echo "</tr>n"; 
}
} 
?> 
</table> 
<?php 
echo "<P><CENTER><font color=$color><U><B>大家好，这个颜色可以了吗？</B></U></font></CENTER>"; 
?> 
